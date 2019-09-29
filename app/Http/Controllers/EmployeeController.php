<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index(){


    }

    public function store(Request $request){

        dd($request->all());

        $this->validate($request,[
            'name'=>'required|min:2|max:50',
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required',
        ]);
        Employee::create($request->all());
        return ['message'=>'OK'];
    }

    public function view()
    {
        $employees= Employee::all();
        return response()->json([
            'employees'=>$employees,
        ],200);
    }
    public function edit($id)
    {
        $employee = Employee::find($id);
        return response()->json([
            'employee'=>$employee,
            'action'=>'update'
        ],200);
    }

    public function update(Request $request,$id)
    {

        Employee::find($id)->update($request->all());
        return 'updated';
    }

    public function delete($id)
    {
        Employee::find($id)->delete();
        return 'deleted';
    }
}
