<?php

namespace App\Http\Controllers\Pike;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TableController extends Controller
{
    public function basic(){
        return view('table.basic');
    }

    public function dataTable(){
        return view('table.data-table');
    }
}
