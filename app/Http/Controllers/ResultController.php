<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exams = Exam::with('teacher')->get();
        $students =Student::all();
        return view('Results.create', [
        'exams'=>$exams ,
        'students'=>$students
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
        $request->validate([
            'mark'=>'required|numeric|max:20'
        ]);
        $e=Exam::where('id',$request['exam_id'])->with('teacher')->first();
        $s=Student::where('id',$request['student_id'])->with('classroom','classroom.teacher')->first();
        //dd();
        foreach ($s->classroom as $class) {
        if($e->teacher_id == $class->teacher->id){
        $student = Student::findOrFail($request['student_id']);
        $student->exam()->syncWithoutDetaching([$request['exam_id']=>['mark'=>$request['mark']]]);
        return redirect()->route('Student.index');

       } 
       else{
            return redirect()->back()->with('msg','this student is in another class');
       }
       
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
