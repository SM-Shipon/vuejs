<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){

//        return view('student.index');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|min:2|max:50',
            'phone'=>'required',
            'address'=>'required',
            'roll'=>'required',
        ]);
        Student::create($request->all());
        return ['message'=>'OK'];
    }

    public function view()
    {
        $students = Student::all();
        return response()->json([
            'students'=>$students
        ],200);
    }
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit',compact('student'));
    }

    public function update(Request $request,$id)
    {
        $student = Student::find($id)->update($request->all());
        return 'updated';
    }

    public function delete($id)
    {
        Student::find($id)->delete();
        return 'deleted';
    }
}
