@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4 Admin Template')

@section('content')
    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Event And Method</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item ">Event And Method</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row" id="root">
                <div class="col-md-6">
                    <input type="text" v-model="newList">
                    <button v-on:click="addNewList()">Add</button><!-- @ shortend for v-on-->
                    <ul >
                        <li v-for="(list, i) in lists">
                            <p>
                                @{{ i+1 }}. @{{ list }} &nbsp;&nbsp;<button class="btn btn-xs btn-warning" @click="remove(i)">X</button>
                            </p>
                        </li>
                    </ul>
                </div>

                <div>
                    <h5>Event Modifers </h5>
                    <a href="#" class="btn btn-info btn-sm"  v-on:click.once="clickButton" > Trigger Only Once </a>
                    <a href="https://google.com" class="btn btn-info btn-sm" @click="clickButton"  target="_blank">Trigger & Redirect</a>
                    <a href="https://google.com"  class="btn btn-success btn-sm" v-on:click.prevent="clickButton"  target="_blank">Only Trigger but Not Redirect</a>

                    <h5>Key Modifers</h5>
                    <input type="text" class="form-control" v-on:keyup.space.enter="clickButton">
                    <h5>Event Modifer Exercise1</h5>
                    <input type="text" class="form-control" v-on:keyup = "eventModifiers"  placeholder=" Bind Data On Keyup event with Method   "><span>Output: @{{name}}</span>
                    <br>
                    <h5>Event Modifer Exercise2</h5>
                    <input type="text" class="form-control"  v-on:keyup = "name=$event.target.value" placeholder=" Bind Data On Keyup event without Method   "><span>Output: @{{name}}</span>
                    <br><br>
                    <!-- v-on:keyup.enter
                     v-on:keyup.shift.enter
                     v-on:keyup.ctrl.enter
                     Here shift/ ctrl is a modifier key and enter is a key modifier
                     -->
                    <input type="text" class="form-control"  v-on:keyup.shift.enter = "name=$event.target.value"  placeholder=" Bind Data On Keyup event With Shift Enter   "><span>Output: @{{name}}</span>

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
                name: '',
                newList:'',
              lists:['HTML','CSS','Bootstrap'],
            },
            methods:{
                addNewList: function () {
                  this.lists.push(this.newList);
                    this.newList="";
                },
                remove:function (i) {
                    this.lists.splice(i,1);
                },
                clickButton: function(){
                   this.name = event.target.value;
                    alert("FIRE");
                },
                eventModifiers: function(event){
                    this.name = event.target.value;
                   // var data = event.target.value;
                   // alert(data);
                }
            }

        });
    </script>


@stop