<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function student(){
        return $this->belongsTo(Student::class, 'student_id','id');
    }
    public function class(){
        return $this->belongsTo(Classes::class, 'class_id','id');
    }
}
