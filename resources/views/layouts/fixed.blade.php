<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
    <meta name="author" content="Pike Web Development - https://www.pikephp.com">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
    <!-- END CSS for this page -->

    {{--To include css from perspective file --}}
    <style>
        .content{
            min-height: 800px;
        }
    </style>
    @yield('css')
</head>

<body class="admin body">
<div id="app">
    <!-- top bar navigation -->
    @include('includes.top-navbar')
    <!-- End Navigation -->


    <!-- Left Sidebar -->
    <div class="left main-sidebar">
       @include('includes.left-sidebar')
    </div>
    <!-- End Sidebar -->


    <div class="content-page" >
        @yield('content')
    </div>
    <!-- END content-page -->

    <footer class="footer">
		@include('includes.footer')
    </footer>

</div>
<!-- END main -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{ asset('assets/js/vue.js')}}"></script>
<script src="{{ asset('assets/js/vue.js')}}"></script>
<script src="{{ asset('assets/js/vue-router.js')}}"></script>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/detect.js')}}"></script>
<script src="{{ asset('assets/js/fastclick.js')}}"></script>
<script src="{{ asset('assets/js/jquery.blockUI.js')}}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js')}}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/pikeadmin.js') }}"></script>

<!-- BEGIN Java Script for this page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

{{--include scritp from currespondign page--}}
@yield('script')

<script type="text/javascript">


</script>

<!-- END Java Script for this page -->

</body>
</html>