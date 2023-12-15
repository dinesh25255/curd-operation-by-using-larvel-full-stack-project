<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\student;

class studentcontroller extends Controller
{
    public function index(){
        $data = Student::get();
        return view('student-list', compact('data'));
        

    }
  
    public function addStudent (){
        return view('add-student');
    }
    public function saveStudent ( Request $request){
    
        $request->validate([

            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',

        ]);
            



        
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;

        $stu = new student();
        $stu->name = $name;
        $stu->email = $email;
        $stu->phone = $phone;
        $stu->address = $address;
        $stu->save();

        return redirect()->back()->with('success', "student Added Successfully");

        
    }
    public function editStudent($id){

        
        $data = Student::where('id', '=', $id)->first();
    
        
        return view('edit-student', compact('data'));
    }

public function updateStudent(Request $request)
{
    // Validate the form data
    $request->validate([
        'name'    => 'required',
        'email'   => 'required|email',
        'phone'   => 'required',
        'address' => 'required',
    ]);

    $studentId = $request->input('id');

    
    $stu = Student::find($studentId);

    
    $stu->name = $request->input('name');
    $stu->email = $request->input('email');
    $stu->phone = $request->input('phone');
    $stu->address = $request->input('address');


    $stu->save();

    
    return redirect()->back()->with('success', 'Student updated successfully');
}
public function deleteStudent($id){
    Student::where('id', '=', $id)->delete();
    return redirect()->back()->with('success', 'Student delete successfully');


}



}  