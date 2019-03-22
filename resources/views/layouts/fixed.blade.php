<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    <meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
    <meta name="author" content="Pike Web Development - https://www.pikephp.com">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">
    <!-- Font Awesome CSS -->
    <link href="{{ asset('public/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
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

<body class="adminbody">
<div id="main">
    <!-- top bar navigation -->
    @include('includes.top-navbar')
    <!-- End Navigation -->


    <!-- Left Sidebar -->
    <div class="left main-sidebar">
       @include('includes.left-sidebar')
    </div>
    <!-- End Sidebar -->


    <div class="content-page">
        @yield('content')
    </div>
    <!-- END content-page -->

    <footer class="footer">
		@include('includes.footer')
    </footer>

</div>
<!-- END main -->
<script src="{{ asset('public/assets/js/vue.js')}}"></script>
<script src="{{ asset('public/assets/js/vue-router.js')}}"></script>

<script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/js/moment.min.js') }}"></script>
<script src="{{ asset('public/assets/js/modernizr.min.js') }}"></script>
<script src="{{ asset('public/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('public/assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/assets/js/detect.js')}}"></script>
<script src="{{ asset('public/assets/js/fastclick.js')}}"></script>
<script src="{{ asset('public/assets/js/jquery.blockUI.js')}}"></script>
<script src="{{ asset('public/assets/js/jquery.nicescroll.js')}}"></script>

<!-- App js -->
<script src="{{ asset('public/assets/js/pikeadmin.js') }}"></script>

<!-- BEGIN Java Script for this page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

{{--include scritp from currespondign page--}}
@yield('script')

<script type="text/javascript">


</script>

<script>

</script>
<!-- END Java Script for this page -->

</body>
</html>