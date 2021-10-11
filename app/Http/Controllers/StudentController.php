<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentValidation;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('grade')->get();

        return view('Students.index',[
            'students'=>$students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        return view('Students.create',compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentValidation $request)
    {
        Student::create([
            'code'=>$request['code'],
            'name'=>$request['name'],
            'birthday'=>$request['birthday'],
            'parent_phone'=>$request['phone'],
            'grade_id'=>$request['grade_id']

        ]);
        return redirect()->route('Student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $student = Student::where('id',$id)->with(['classroom','classroom.teacher','grade','exam','exam.teacher'])->first();
      //  dd($student);
         return view('Students.show',[
             'student'=>$student
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student= Student::findOrFail($id)->with('grade')->first();
        $grades = Grade::where('id','!=',$student->grade_id)->get();
         return view('Students.edit',[
             'student'=>$student,
             'grades'=>$grades
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentValidation $request, $id)
    {
        $student= Student::findOrFail($id);
         $student->update($request->all());
        return redirect()->route('Student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student =Student::findOrFail($id);
        $student->delete();
        return redirect()->route('Student.index');
    }

    public function payment($id){

        $student = Student::findOrFail($id)->with('grade')->first();
       
        return view('payments.create',[
            'student'=>$student
        ]);

    }
    public function addpayment(Request $request , $id){
     
        $c =0;
        //mzl khss ngad next payment ou blan d latest m3a dates
        
        $student = Student::findOrFail($id)->with('grade')->first();
        $payments = Payment::where('paymentable_id',$id)->get();
        foreach ($payments as $p) {
            $c = $c + $p->months;
            
        }
        if ($c + $request['months'] <= 9){
          
        $student->payment()->create([
         'months'=>$request['months'],
         'last_payment'=> Carbon::now()->format('Y-m-d'),
         'next_payment'=> Carbon::now()->addMonths($request['months']),
         'amount'=>$student->grade->monthly_amount*$request['months']
        ]);
               
        return redirect()->route('Student.index');
        }
        else{
             $r = 9 - $c;
            return redirect()->back()->with('msg', $r);
        }
     //  dd($student->payment());
       

       // dd($student);
       
    }
    public function students()
    {
        $today = Carbon::now()->format('Y-m-d');    
        $students = Student::with('payment')->get();
      // dd($students);

      return view('payments.students',compact(['students','today']));   
          
    }
    public function search(Request $request){
    
        $request->validate([
            'search' =>'string|required|exists:students,code'
        ]);
        $student = Student::with('payment')->where('code',$request['search'])->first();      
        
        
         
        return view('Students.show',compact('student'));
    }

}
/* $notes = App\Note::query()
        ->with(['noteable' => function (MorphTo $morphTo) {
            $morphTo->morphWith([
                Review::class => ['repairs']
            ]);
    }])->get();*/