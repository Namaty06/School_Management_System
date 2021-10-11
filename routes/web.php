<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
 
Route::middleware('auth')->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
Route::resource('Grade', GradeController::class); 
Route::resource('Exam', ExamController::class); 
Route::resource('Result', ResultController::class);
//
Route::resource('Teacher', TeacherController::class);  
Route::get('/payment/teacher/{id}', [App\Http\Controllers\TeacherController::class, 'payment'])->name('teacher.payment');
Route::post('/payment/teacher/confirm/{id}', [App\Http\Controllers\TeacherController::class, 'addpayment'])->name('confirm.payment');
Route::post('/teachers/search', [App\Http\Controllers\TeacherController::class, 'search'])->name('teacher.search');

//
Route::resource('Student', StudentController::class);  
Route::get('/payment/student/{id}', [App\Http\Controllers\StudentController::class, 'payment'])->name('student.payment');
Route::post('/payment/student/confirm/{id}', [App\Http\Controllers\StudentController::class, 'addpayment'])->name('payment.student');
Route::post('/students/search', [App\Http\Controllers\StudentController::class, 'search'])->name('student.search');


//
Route::resource('Classroom', ClassroomController::class); 
Route::get('/Classroom_student', [App\Http\Controllers\ClassroomController::class, 'classstudent'])->name('class.student');
Route::post('/Classroom_student', [App\Http\Controllers\ClassroomController::class, 'studentclass'])->name('student.class');
//
Route::get('/payment/students', [App\Http\Controllers\StudentController::class, 'students'])->name('spayment');
Route::get('/payment/teachers', [App\Http\Controllers\TeacherController::class, 'teacher'])->name('tpayment');

});

