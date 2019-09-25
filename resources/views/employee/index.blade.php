@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4 Admin Template')


@section('content')
    <!-- Start content -->
    <div class="content">
        <router-view></router-view>
    </div>
    <!-- END content -->
@stop


@section('css')
    <style>
        .help-block{
            color:red;
        }
    </style>
@stop
