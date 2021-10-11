<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = 0;
        $t = Carbon::now()->format('Y-m-d');
        
        dd($teachers = Teacher::join('payments','teachers.id','=','payments.paymentable_id')->where('next_payment','<',$t)->latest());
        $students = Student::join('payments','students.id','=','payments.paymentable_id')->where('next_payment','<',$t);
        $earnings = Payment::where('paymentable_type','App\Models\Student')->sum('amount');
        $fees = Payment::where('paymentable_type','App\Models\Teacher')->sum('amount');
        $count = Student::count();
        $t=Teacher::count();
        $u=User::count();
        $employees = $t+$u;
       

        return view('dashboard',compact('students','teachers','t','earnings','fees','count','employees'));
    }
}
