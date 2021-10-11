<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherValidation;
use App\Models\Payment;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers= Teacher::all();
        
        return view('Teachers.index',[
            'teachers'=>$teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherValidation $request)
    {
       
      
        
        Teacher::create([
              'cin'=>$request->input('cin'),
            'name'=>$request->input('name'),
            'birthday'=>$request->input('birthday'),
            'phone'=>$request->input('phone'),
            'subject'=>$request['subject'],
            'salarie'=>$request->input('salarie')
        ]);
       

        return redirect()->route('Teacher.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher=Teacher::where('id',$id)->with('exam' ,'classroom' , 'classroom.grade','payment')->first();
        return view('Teachers.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher=Teacher::findOrFail($id);
        return view('Teachers.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherValidation $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());
        return redirect()->route('Teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher=Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('Teacher.index');

    }
 
    public function payment($id){

      /*  $today = Carbon::now()->format('Y-m-d');   
        $payment = Payment::where('paymentable_id',$id)->where('next_payment','')->last();
        $today = Carbon::now()->format('Y-m-d');   
        dd($payment);
        $d = $payment->next_payment->diffInDays($today);*/
          $teacher = Teacher::findOrFail($id);
        return view('payments.Tcreate',compact('teacher'));
    }

    public function addpayment(Request $request , $id){
         
        $teacher = Teacher::findOrFail($id);    
        $c= 0;
        $payments = Payment::where('paymentable_id',$id)->get();
        foreach ($payments as $p) {
            $c = $c + $p->months;
            
        }
        if ($c + $request['months'] <= 9){
          
        $teacher->payment()->create([
         'months'=>$request['months'],
         'last_payment'=> Carbon::now()->format('Y-m-d'),
         'next_payment'=> Carbon::now()->addMonths($request['months']),
         'amount'=>$teacher->salarie*$request['months']
        ]);
               
        return redirect()->route('Teacher.index');
        }
        else{
             $r = 9 - $c;
            return redirect()->back()->with('msg', $r);
        }
          
    }
    
    public function teacher(){

        $today = Carbon::now()->format('Y-m-d');    
        $teachers = Teacher::with('payment')->get();
        //join('payments','teachers.id','=','payments.paymentable_id')->get();
         
        return view('payments.teacher',compact('teachers'));
    }
 
    public function search(Request $request){
        $request->validate([
            'search' =>'string|exists:teachers,cin'
        ]);
        $teacher = Teacher::with('exam' ,'classroom' , 'classroom.grade','payment')->where('cin',$request['search'])->first();       
         
        return view('Teachers.show',compact('teacher'));
    }
}
