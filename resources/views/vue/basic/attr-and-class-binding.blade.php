@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4  ')

@section('content')
    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Attribute & Class Binding</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item ">Attribute & Class Binding</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row" id="root">
                <div class="col-md-6">
                    <ul>
                        <li>
                            <a :class="{'active':activeLink=='link1'}" :href="link1.url" v-bind:title="link1.title">@{{link1.text}}</a> <!-- : shortend for v-bind-->

                        </li>
                        <li>
                            <a :class="{'active':activeLink=='link2'}" v-bind:href="link2.url" :title="link2.title">@{{link2.text}}</a> <!-- : shortend for v-bind-->

                        </li>
                    </ul>

                </div>
                <p>HTML Code : </p>&nbsp;
                <p v-html="html"></p>

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
        var app = new Vue({
            el:"#root",
            data:{
              link1:{
                  text:'Facebook',title:'Go to Facebook',url:'http://facebook.com'
              },
                link2:{
                    text:'Youtube',title:'Go to Youtube',url:'http://youtube.com'
                },
               activeLink:'link1',
                //activeLink:'link2',
                html:'<a href="http://turabali.com">My Portfolio</a>'
            },
            mounted :function () {
              console.log('Mounted')
            }
        });
    </script>


@stop