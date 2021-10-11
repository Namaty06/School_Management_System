<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;


    protected $fillable = [
        'teacher_id',
        'type'
    ];
    
    public function student(){

        return $this->belongsToMany(Student::class,'results')->withPivot('mark');
    
    }
    public function teacher(){

        return $this->belongsTo(Teacher::class);
    
    }
}
