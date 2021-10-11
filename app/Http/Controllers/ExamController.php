<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Teacher;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::with('teacher')->get();
        
        return view('exam.index',[
        'exams'=>$exams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('exam.create',[
        'teachers'=>$teachers
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
        $exams = Exam::all();
        if(isEmpty($exams)){       
            Exam::create([
                'teacher_id'=>$request['teacher_id'],
                'type'=>$request['type']
               ]);
               return redirect()->route('Exam.index');
         }
       else
           {
     foreach ($exams as $exam) {
            if($exam->teacher_id == $request['teacher_id'] && $exam->type == $request['type']){
              return redirect()->back()->with('msg','Already created');
            }
            else{
              Exam::create([
               'teacher_id'=>$request['teacher_id'],
               'type'=>$request['type']
              ]);
              return redirect()->route('Exam.index');
            }
        }
    }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        $teachers = Teacher::where('id','!=',$exam->teacher_id)->get();
        return view('exam.edit',[
            'exam'=>$exam,
            'teachers'=>$teachers
            ]
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->update($request->all());
        return redirect()->route('Exam.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam , $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();
        return redirect()->route('Exam.index');
    }
}
