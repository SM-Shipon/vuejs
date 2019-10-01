<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\District;
use Illuminate\Http\Request;

class CityController extends Controller
{


    public function get_country()
    {
        $countries = Country::all();
        return response()->json([
            'countries'=>$countries,
        ],200);
    }
    public function get_district($id)
    {
        $districts = District::query()->where('country_id',$id)->get();
        return response()->json([
            'districts'=>$districts,
        ],200);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|min:2|max:50',

        ]);
        City::create($request->all());
        return ['message'=>'OK'];
    }

    public function view()
    {
        $cities = City::with(['district','country'])->get();
        return response()->json([
            'cities'=>$cities,
        ],200);
    }
    public function edit($id)
    {
        $city = City::find($id);
        return response()->json([
            'city'=>$city,
            'action'=>'update'
        ],200);
    }
    public function district()
    {
        $districts= District::all();
        return response()->json([
            'districts'=>$districts,
            'action'=>'update'
        ],200);
    }

    public function update(Request $request,$id)
    {
        City::find($id)->update($request->all());
        return 'updated';
    }

    public function delete($id)
    {
        City::find($id)->delete();
        return 'deleted';
    }
}
