<?php

namespace App\Http\Controllers\Pike;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    public function index()
    {
        return view('chart.index');
    }
}
