<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Classroom_Student;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Builder\Class_;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::with('teacher','grade')->get();
       // dd($classrooms);
        return view('Classrooms.index',
        [
            'classrooms'=>$classrooms
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms= Classroom::all();
        $teachers= Teacher::where(function($query) use($classrooms){ 
            foreach ($classrooms as $classroom) {
                 $query->where('id','!=',$classroom->teacher_id);
                
            }
        
        })->get();
       
        $grades = Grade::all();
        
        return view('Classrooms.create',
        [
            'teachers'=>$teachers,
            'grades'=>$grades 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $classrooms = Classroom::all();
        $exists = Classroom::where('number','=',$request['number'])->where('year','=',$request['year'])->get();
       
        if(!$exists->isEmpty()){

          return Redirect::back()->with(['msg' => 'Classroom deja creer']);
        }
        else{              
        $request->validate([
            'number'=>'required|numeric|max:20',
            'year'=>'required|numeric',
            'teacher_id'=>'required',
            'grade_id'=>'required'
        ]);
        Classroom::create([
            'number'=>$request['number'],
            'year'=>$request['year'],
            'teacher_id'=>$request['teacher_id'],
            'grade_id'=>$request['grade_id']  
        ]);
        return redirect()->route('Classroom.index');
        
      }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $classroom = Classroom::where('id',$id)->with('student','teacher','grade')->first();
     return view('Classrooms.show',compact('classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $classrooms= Classroom::all();
        $teachers= Teacher::where(function($query) use($classrooms){ 
            foreach ($classrooms as $classroom) {
                 $query->where('id','!=',$classroom->teacher_id);
                
            }
         })->get();
    $classroom = Classroom::findOrFail($id)->with(['teacher','grade'])->first();  
     $grades = Grade::where('id','!=',$classroom->grade->id)->get();
     
    return view('Classrooms.edit',
    [
        'classroom'=>$classroom,
      'teachers'=>$teachers,
      'grades'=>$grades  
     ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exists = Classroom::where('number','=',$request['number'])->where('year','=',$request['year'])->where('id','!=',$id)->get();
       
        if(!$exists->isEmpty()){

          return Redirect::back()->with(['msg' => 'Classroom already picked']);
        }
        else{
            $classroom = Classroom::findOrFail($id);
        $classroom->update($request->all());
        return redirect()->route('Classroom.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom , $id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();
        return redirect()->route('Classroom.index');
    }

    public function studentclass(Request $request){
       
        $classcount = Classroom_Student::where('classroom_id','=',$request['classroom_id'])->count();     
        $studentcount = Classroom_Student::where('student_id','=',$request['student_id'])->count();     
        $c = Classroom::where('id','=',$request['classroom_id'])->first();
        $s= Student::where('id','=',$request['student_id'])->first();

    if($studentcount < 8)
    {
    if($classcount < 24){
        
        if($s->grade_id == $c->grade_id){

       
        $student =Student::findOrFail($request['student_id']);       
        $student->classroom()->syncWithoutDetaching($request['classroom_id']);
        return redirect()->route('Classroom.index');
         } 
         else{
            return redirect()->route('class.student')->with('msg','grade not similar');
         }
    }
    else
    {
       return redirect()->route('class.student')->with('msg','Class is full');
    }
         }
    else
    {
       return redirect()->route('class.student')->with('msg','maximum class of a student is 7');
    }

    }

    public function classstudent(){
        
        $class = Classroom_Student::where('classroom_id','=','2')->count();
        $classrooms = Classroom::all();
        $students = Student::all();
        return view('Classrooms.studentclass',
        ['classrooms'=>$classrooms
        ,'students'=>$students]);

    }
}
