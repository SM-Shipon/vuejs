<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueJsController extends Controller
{
    Public function index(){
        return view('vue.basic.hello-world');
    }
    Public function data_binding(){
        return view('vue.basic.data-binding');
    }
    Public function attr_class_binding(){
        return view('vue.basic.attr-and-class-binding');
    }
    Public function list_render(){
        return view('vue.basic.list-render');
    }
    Public function event_method(){
        return view('vue.basic.event-method');
    }
    Public function computed_properties(){
        return view('vue.basic.computed-properties');
    }
    Public function filter(){
        return view('vue.basic.filter');
    }
    Public function component(){
        return view('vue.basic.component');
    }
    Public function dynamic_component(){
        return view('vue.basic.dynamic-component');
    }
    Public function animation(){
        return view('vue.basic.animation');
    }
    Public function vue_router(){
        return view('vue.basic.vue-router');
    }
    Public function watcher(){
        return view('vue.basic.watcher');
    }



    Public function e_commerce(){
        return view('vue.advance.e-commerce');
    }

    Public function components(){
        return view('vue.advance.components');
    }

    Public function mailbox(){
        return view('vue.advance.mailbox');
    }


    Public function stater_page(){
        return view('vue.stater-page');
    }


}
