@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4 Admin Template')

@section('content')
    <!-- Start content -->
    <div class="content" >

        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Data Binding</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item ">Data Binding</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row" id="root">

                <div class="col-md-6">
                    <input type="text" v-model="newList" required>
                    <button type="submit" @click="addNewList()">Add</button><!-- @ shortend for v-on-->
                    <ul >
                        <transition-group name="animate">
                            <li v-for="(list,index) in lists" :key="index">
                                <p>
                                    @{{ index+1 }}. @{{ list }} &nbsp;&nbsp;<button class="btn btn-xs btn-warning" @click="remove(index)">X</button>
                                </p>
                            </li>
                        </transition-group>
                    </ul>
                </div>
                <div class="col-md-6">


                </div>

                <div class="col-md-2">
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-warning btn-sm" @click="show=!show">Toggle</button>
                        </div>
                    </div>
                </div>
                <transition name="bar">
                    <div class="col-md-10 foo" v-show="show">
                        <h4 class="">@{{name}} </h4>
                    </div>
                </transition>
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

        .foo{
        background-color: #00b393;
            text-align: center;
            width: 500px;
            margin:auto;
            min-height:100px;

        }
        .animate-enter-active, .animate-leave-active {
            /*transition: opacity 3s;*/
            /*transition: transform 1s;*/
            transition: margin-left 1s;

        }
        .animate-enter, .animate-leave-to {
          /*opacity: 0;*/
            /*transform: rotate(360deg);*/
            margin-left: -300px;
        }
        .bar-enter-active, .bar-leave-active {
            transition: opacity 3s;
            /*transition: transform 1s;*/
            /*transition: margin-left 1s;*/

        }
        .bar-enter, .bar-leave-to {
            opacity: 0;
            /*transform: rotate(360deg);*/
            /*margin-left: -300px;*/
        }


    </style>
@stop

@section('script')
    <script type="text/javascript">
        var app = new Vue({
            el:"#root",
            data:{
                show:false,
                name:"Shipon Mahmud",
                newList:'',
                lists:['HTML','CSS','Jquery'],
            },
            methods:{
                addNewList: function () {
                    this.lists.push(this.newList);
                    this.newList="";
                },
                remove:function (index) {
                    this.lists.splice(index,1);
                }
            }

        });
    </script>


@stop