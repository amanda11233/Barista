<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Teacher;
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
    $class = Classes::find($id);
    return view('view-class', compact('class'));
}

}
