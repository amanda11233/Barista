<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;
use App\Student;
use App\Rating;
class Classes extends Model
{
    protected $table = 'classes';
    public function teacher(){
        return $this->belongsTo(Teacher::class , 'teacher_id', 'id');
    }
    public function student(){
        return $this->belongsToMany(Student::class);
    }
    public function rating(){
        return $this->hasMany(Rating::class, 'class_id', 'id');
    }

    protected $fillable = [
        'class_name','date','teacher_id','price','desc'
    ];
}
