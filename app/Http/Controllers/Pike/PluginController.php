<?php

namespace App\Http\Controllers\Pike;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PluginController extends Controller
{
   public function star_rating()
   {
      return view('plugin.star-rating');
   }

    public function range_slider()
    {
        return view('plugin.range-slider');
    }
    public function tree_view()
    {
        return view('plugin.tree-view');
    }
    public function sweet_alert()
    {
        return view('plugin.sweet-alert');
    }
    public function calender()
    {
        return view('plugin.calendar');
    }
    public function google_map()
    {
        return view('plugin.google-map');
    }
    public function counter_up()
    {
        return view('plugin.counter-up');
    }
}
