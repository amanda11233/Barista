<?php

namespace App\Http\Controllers\Classes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes;
use Auth;
use App\Teacher;
use App\Booking;
use App\Rating;
class ClassesController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin')->except('ratings');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $classes = Classes::all();
        return view('admins.classes.classes', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('admins.classes.addclasses', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       try{
$data = array(
    'class_name' => $request->name,
    'date' => $request->date,
    'teacher_id' => $request->teacher,
    'price' => $request->price,
    'desc' => $request->desc,
);

Classes::create($data);
return redirect()->route('classes.index')->with('success','Class Added');

       }catch(Exception $e){
           dd($e);
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

    public function viewBookings(){
$bookings = Booking::all();
return view('admins.bookings.bookings',compact('bookings'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = Teacher::all();
        $class = Classes::find($id);
        return view('admins.classes.editclasses', compact('class','teachers'));
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
        try{
            $data = array(
                'class_name' => $request->name,
                'date' => $request->date,
                'teacher_id' => $request->teacher,
                'price' => $request->price,
                'desc' => $request->desc,
            );
            
            Classes::where('id', $id)->update($data);
            return redirect()->route('classes.index')->with('success','Class Updated');
            
                   }catch(Exception $e){
                       dd($e);
                   }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
    }
    public function deleteClass($id){
        Classes::where('id',$id)->delete();

        return redirect()->back()->with('success','Classes Deleted!!');
    }

    public function ratings(Request $request, $id){
 $user_id = Auth::id();
 $data = array(
     'student_id' => $user_id,
     'class_id' => $id,
     'rate' => $request->rates,
 );
 
 Rating::create($data);
 return redirect()->back()->with('success','You have rated this clas');
    }
}
