<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom_Student extends Model
{
    use HasFactory;
    public $table = 'classroom_student';
    protected $fillable = [
        'student_id',
        'classroom_id'
    ];
}
