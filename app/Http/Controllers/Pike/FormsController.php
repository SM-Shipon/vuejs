<?php

namespace App\Http\Controllers\Pike;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormsController extends Controller
{
    public function form_general(){
        return view('form.general');
    }


    public function form_select2(){
        return view('form.select2');
    }


    public function form_validation(){
        return view('form.form-validation');
    }


    public function text_editor(){
        return view('form.text-editor');
    }


    public function multiple_file_upload(){
        return view('form.multiple-file-upload');
    }


    public function date_and_time_picker(){
        return view('form.date-time-picker');
    }


    public function color_picker(){
        return view('form.color-picker');
    }

}
