@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4 Admin Template')

@section('content')
    <!-- Start content -->
    <div class="content" id="root">

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

            <div class="row" >
                <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Enter Your Name</h5>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" v-model="name">
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                    <h4 class="">@{{name}} </h4>
                </div>
            </div>

            <div class="row" style="border: 1px solid black"></div>
            <div class="row">
                <div class="col-md-6">
                    <br>
                   <input class="form-control" type="password" v-model="password" placeholder="Enter Password">
                    <h3 v-if="password.length > 8"> Your Password Is More Than 8 Character</h3>
                    <h5 v-else-if="password.length >0 "> Your Password Should More Than 6 Characters</h5>
                    <h3 v-else>Please Enter Password</h3>
                </div>

                <div class="col-md-6">
                    <h3>Rendering Categories & Sub Categories</h3>
                    <ol>
                       <li v-for="category in categories">@{{category.name}}
                           <ul>
                               <li v-for="sub in category.sub">@{{sub}}</li>
                           </ul>
                       </li>
                   </ol>
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
        var app = new Vue({
            el:"#root",
            data:{
                name:"Shipon Mahmud",
                password:'',
                categories:[
                    {name:'JavaScript', sub: ['Vue Js','jQuery']},
                    {name:'PHP', sub: ['Laravel','Cake PHP']}
                ]

            },
            mounted :function () {
              console.log('Mounted')
            }
        });
    </script>


@stop