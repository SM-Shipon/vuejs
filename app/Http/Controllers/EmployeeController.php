<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{

    public function index(){


    }

    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required|min:2|max:50',
            'phone'=>'required',
            'address'=>'required',
            'image'=>'required',
        ]);
        $strpos = strpos($request->image,';');
        $sub = substr($request->image,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;

        $img = Image::make($request->image)->resize(200, 200);
        $upload_path = public_path()."/images/";
        $img->save($upload_path.$name);

        $post = new Employee;
        $post->name = $request->name;
        $post->phone = $request->phone;
        $post->email = $request->email;
        $post->address = $request->address;
        $post->image = $name;
        $post->save();
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
