<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'code',
        'name',
        'birthday',
        'parent_phone',
        'grade_id'

    ];

    public function grade(){

        return $this->belongsTo(Grade::class);
    
    }
    public function payment(){

        return $this->morphMany(Payment::class,'paymentable');
    
    }

    public function classroom(){

        return $this->belongsToMany(Classroom::class)->withTimestamps();
    
    }
    public function exam(){

        return $this->belongsToMany(Exam::class ,'results' )->withPivot('mark');

    }
    public function age()
    {
        return Carbon::parse($this->attributes['birthday'])->age;
    }

}
