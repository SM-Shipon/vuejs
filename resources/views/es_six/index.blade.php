@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4 Admin Template')

@section('content')
    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Understanding Promise Of ECMA6 </h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">ECMA6  </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-xl-8 offset-2">
                    <button id="shipon">Click me</button>
                  <table class="table table-bordered" >
                      <thead>
                      <tr>
                          <th class="text-center">Name</th>
                          <th class="text-center">Email</th>
                      </tr>
                      </thead>

                      <tbody id="user_data">

                      </tbody>
                  </table>
                </div>
            </div>



        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->
@stop
@section('css')

@stop

@section('script')
    <script type="text/javascript">

    </script>
@stop