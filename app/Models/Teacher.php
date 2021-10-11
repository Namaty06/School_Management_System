<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cin',
        'phone',
        'salarie',
        'subject',
        'birthday'
    ];

    public function exam(){

        return $this->hasMany(Exam::class);
    
    }
    public function age()
    {
        return Carbon::parse($this->attributes['birthday'])->age;
    }
   

    
    public function payment(){

        return $this->morphMany(Payment::class,'paymentable');
    
    }
    
    public function classroom(){

        return $this->hasOne(Classroom::class);
    
    }
   
}
