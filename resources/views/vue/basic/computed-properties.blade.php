@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4 Admin Template')

@section('content')
    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Computed Properties</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item ">Computed Properties</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row" id="root">
                <div class="col-md-6">
                    <h3> All Payments </h3>
                    <ul >
                        <li v-for="(payment, i) in payments">
                            @{{ i+1 }}. @{{ payment.name }} (@{{ payment.amount}})
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3> Unpaid Payments </h3>
                    <ul >
                        <li v-for="(payment, i) in unpaidPayments">
                            @{{ i+1 }}. @{{ payment.name }} (@{{ payment.amount}})
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3> Total Amount: @{{totalAmount}} </h3>

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
                payments:[
                    {name:'House Rent',amount:1000,paid:true},
                    {name:'Electricity',amount:500,paid:false},
                    {name:'Gas',amount:800,paid:true},
                    {name:'Water',amount:400,paid:true},
                    {name:'Internet',amount:1200,paid:false},
                ]
            },
            computed:{
              unpaidPayments:function () {
                 return this.payments.filter(function (p) {
                     return !p.paid;
                 });
              },
                totalAmount:function () {
                  var sum=0;
                  for(var i=0; i < this.payments.length; i++){
                     sum += this.payments[i].amount;
                  }
                    return sum;
                }
            }
        });
    </script>


@stop