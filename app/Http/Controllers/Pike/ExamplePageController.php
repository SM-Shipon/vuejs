<?php

namespace App\Http\Controllers\Pike;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamplePageController extends Controller
{
    public function pricing_table()
    {
        return view('example.pricing-table');
    }

    public function countdown()
    {
        return view('example.countdown');
    }
    public function invoice()
    {
        return view('example.invoice');
    }
    public function login_register()
    {
        return view('example.login-register');
    }
    public function blank_page()
    {
        return view('example.blank-page');
    }
}
