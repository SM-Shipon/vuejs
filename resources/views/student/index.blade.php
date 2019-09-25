@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4 Admin Template')


@section('content')
    <router-view></router-view>
@stop


@section('css')
    <style>
        .help-block{
            color:red;
        }
    </style>
@stop

{{--@section('script')--}}
{{--@stop--}}