<?php

namespace App\Http\Controllers\Pike;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserInterfaceController extends Controller
{
    public function alert(){
        return view('userinterface/alert');
    }

    public function button(){
        return view('userinterface/button');
    }

    public function cards(){
        return view('userinterface/cards');
    }

    public function carousel(){
        return view('userinterface/carousel');
    }

    public function collapse(){
        return view('userinterface/collapse');
    }

    public function icons(){
        return view('userinterface/icons');
    }

    public function tooltipsAndPopovers(){
        return view('userinterface/tooltips-popovers');
    }

    public function modals(){
        return view('userinterface/modals');
    }

}
