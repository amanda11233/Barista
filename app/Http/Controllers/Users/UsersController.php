<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Auth;
use App\Student;
use App\Teacher;
class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('admins.students.students', compact('students'));
    }
  
public function viewTeachers(){
    $teachers = Teacher::all();
    return view('admins.teachers.teachers',compact('teachers'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admins.teachers.addteachers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
    public function store(Request $request)
    {
  $teachers = Teacher::where('email',$request->email)->count();

  if($teachers >= 1){
    return redirect()->back()->with('error','Email Already Used');
  }else{

    if(Input::hasFile('img')){
        $teacherImage = $request->img;
    $extensionteacherImage = $teacherImage->getClientOriginalExtension();
    $nameteacherImage = $teacherImage->getClientOriginalName();
    $filenameteacherImage = $nameteacherImage;
    $pathteacherImage = public_path().'/images/teachers/'.$request->email.'/';
    $teacherImage->move($pathteacherImage,$filenameteacherImage);
    $data = array(
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'address' => $request->address,
        'phone' => $request->phone,
        'gender' => $request->gender,
        'picture' => $filenameteacherImage,
        
    );
       
    
    
        Teacher::create($data);
    
            
    
            return redirect()->route('users.teachers')->with('success','Teacher Added');
    
        }
  }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where('id', $id)->delete();
        return redirect()->back()->with('success','User Deleted');
    }
    public function deleteTeacher($id){
        $teacher = Teacher::where('id',$id)->first();
        File::deleteDirectory(public_path().'/images/teachers/'.$teacher->email.'/');
        Teacher::where('id', $id)->delete();
        return redirect()->back()->with('success','Teacher Deleted');

    }
}
