<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;
use App\Student;
class Classes extends Model
{
    protected $table = 'classes';
    public function teacher(){
        return $this->belongsTo(Teacher::class , 'teacher_id', 'id');
    }
    public function student(){
        return $this->belongsToMany(Student::class);
    }

    protected $fillable = [
        'class_name','date','teacher_id','price','desc'
    ];
}
