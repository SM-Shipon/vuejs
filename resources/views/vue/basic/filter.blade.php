@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4 Admin Template')

@section('content')
    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Filter </h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item ">Filter </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row" id="root">
                <div class="col-md-6">
                    <h3><b>Uppercase/Lowercase</b> </h3>
                    <h3> Name:  @{{ name | upper }} </h3>
                    <h3> Profession:  @{{ profession | lower }} </h3>
                    <h3> Date:  @{{ date | dateFormat }} </h3>

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

        Vue.filter("lower",function (f) {//Global Filter
            return f.toLowerCase();
        })
        var app = new Vue({
            el:"#root",
            data:{
                name:'Mohammed Shipon',
                profession:'Laravel Developer',
                date: new Date()

            },
            filters:{//Local Filter
              upper:function (f) {
                  if(!f){
                   return 'Nothing Found to make Uppercase'
                  }else{
                      return f.toUpperCase();
                  }

              },
              dateFormat:function (d) {
                  return d.getUTCDate() +"-"+ d.getUTCMonth() +"-"+ d.getUTCFullYear()
              }
            },

        });
    </script>


@stop