<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
    'level',
    'grade',
    'monthly_amount'
    ];

    public function student(){

        return $this->hasMany(Student::class);
    
    }
    public function classroom(){

        return $this->hasMany(Classroom::class);
    
    }
}
