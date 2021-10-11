<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'grade_id',
        'teacher_id',
        'year'
    ];

    public function student(){

        return $this->belongsToMany(Student::class)->withTimestamps();
    
    }

    public function teacher(){

        return $this->belongsTo(Teacher::class);
    
    }
    public function grade(){

        return $this->belongsTo(Grade::class);
    
    }


}
