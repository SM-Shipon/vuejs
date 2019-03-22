@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4 Admin Template')

@section('content')
    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Vue Router</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item ">Vue Router</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row" id="root">
                <div class="col-xl-12">
                    <nav class="navbar navbar-expand-sm bg-light navbar-light">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <router-link class="nav-link" to="/home">Home</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" to="/about">About</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" to="/contact">Contact</router-link>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-12" class="text-center">
                    <router-view ></router-view>
                </div>
            </div>



        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->
@stop
@section('css')
    <style>
        ul{
            list-style: none;
        }
        li{
            padding:5px;
        }
        .active{
            background: #00b393;
            color: #FFFFFF;
            padding: 5px;
        }



    </style>
@stop

@section('script')
    <script type="text/javascript">


        var Home = {
            template:`
                <div class="container">
                    <div class="text-center"> <h3>Home Page.....</h3></div>
                </div>`
        };
        var About = {
            template:`
                <div class="container">
                    <div class="text-center"> <h3>About Page.....</h3></div>
                </div>`
        };
        var Contact = {
            template:`
                <div class="container">
                    <div class="text-center"> <h3>Contact Page.....</h3></div>
                </div >`
        };
        var Sm = {
            template:`
                <div class="container">
                    <div class="text-center"> <h3>Contact Page.....</h3></div>
                </div >`
        };


        var routes =[
            {path: '/home', component:Home},
            {path: '/about', component:About},
            {path: '/contact', component:Contact},
            {path: '/sm', component:Sm}
        ];
        var router = new VueRouter({
            routes: routes,
            mode: 'history',
            base:'/vuejs/vue-basic/vue-router'
        })

        var app = new Vue({
            router :router,
        }).$mount("#root");
    </script>


@stop