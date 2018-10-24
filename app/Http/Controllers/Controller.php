<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Teacher;
use App\Booking;
use Auth;
use App\Classes;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function welcome(){
        $teachers = Teacher::limit('3')->get();

        return view('welcome', compact('teachers'));
    }
public function classes(){
    $classes = Classes::all();
    return view('classes',compact('classes'));
}

public function viewClasses($id){
  
    if(Auth::guard('web')->user()){
        $bookingCheck = Booking::where([['student_id', Auth::id()],['class_id', $id]])->count();
        $class = Classes::find($id);
        $ratings = $class->rating->avg('rate');
        return view('view-class', compact('class','bookingCheck','ratings'));
    }else{
        
        $class = Classes::find($id);
        $ratings = $class->rating->avg('rate');
        return view('view-class', compact('class','ratings'));
    }
  
}

}
