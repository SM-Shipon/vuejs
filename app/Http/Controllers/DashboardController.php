<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    Public function index(){
        return view('dashboard.index');
    }
    Public function blank_page(){
        return view('dashboard.view-router');
    }

}
