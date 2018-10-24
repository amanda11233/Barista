<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
class FeedBack extends Model
{
    protected $table = 'feedbacks';
    protected $fillable = [
        'student_id','class_id','comment'
    ];
    public function student(){
        return $this->belongsTo(Student::class, 'student_id','id');
    }
}
