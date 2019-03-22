@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4 Admin Template')

@section('content')

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">WYSIWYG text editor</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">WYSIWYG text editor</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->



            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Trumbowyg - A lightweight WYSIWYG editor</h4>
                <p>Light, translatable and customisable jQuery plugin. Beautiful design, generates semantic code, comes with a powerful API. <a target="_blank" href="https://alex-d.github.io/Trumbowyg/">Trumbowyg Documentation</a></p>
            </div>


            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-file-o"></i> WYSIWYG editor example</h3>
                            Editor and generated code are optimized for HTML5 support. Compatible with all recents browsers like IE9+, Chrome, Opera and Firefox.
                        </div>

                        <div class="card-body">

                            <textarea rows="3" class="form-control editor" name="content"></textarea>

                        </div>
                    </div><!-- end card-->
                </div>

            </div>




        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->
@stop


@section('css')
    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/trumbowyg/ui/trumbowyg.min.css') }}">
    <!-- END CSS for this page -->
@stop

@section('script')
    <!-- BEGIN Java Script for this page -->
    <script src="{{ asset('assets/plugins/trumbowyg/trumbowyg.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            'use strict';
            $('.editor').trumbowyg();
        });
    </script>
    <!-- END Java Script for this page -->
@stop