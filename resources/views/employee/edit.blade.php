@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4 Admin Template')


@section('content')
    <student-edit :student="{{ $student }}"></student-edit>


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