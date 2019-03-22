@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4 Admin Template')

@section('content')
    <!-- Start content -->
    <div class="content"  id="root">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">List Rendering</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item ">List Rendering</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-md-6">
                    <h3> List </h3>
                    <ul >
                        <li v-for="(list, i) in lists">
                            @{{ i+1 }}. @{{ list }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3> Conditional Rendering (v-if or v-show)</h3>
                    <ul >
                        <li v-for="(skill, i) in skills" v-if="skill.experience >= 2">
                            @{{ i+1 }}. @{{ skill.name }}(@{{ skill.experience }})
                        </li>
                    </ul>
                    <h2>Use of v-if and v-else</h2>
                    <spsn class="btn btn-warning btn-sm" v-on:click="show = !show"> Click</spsn>
                    <h5 v-if="show">
                       SM Mahmud
                    </h5>
                    <h5 v-else>
                        None
                    </h5>
                </div>
            </div>
            <div class="row" style="border: 1px solid black"></div>
            <div class="row">
                <div class="col-md-6">
                    <h3>Check Data type:</h3>
                    <input class="form-control" type="text"  v-model="age"><br>
                    <input class="form-control" type="text"  v-model.number="age">
                    <p>Data Type: @{{ typeof age}}</p>
                    <p>Name: @{{ movieName}}</p>
                    <button v-on:click=" movieName ='Anacuda'">Change </button>

                    <div >
                        <h3> Conditionaly Data rendering</h3>
                        <p v-if="itemInStock > 10">@{{itemInStock}} </p>
                        <p v-else-if="itemInStock > 0">Your Stock is running Low </p>
                        <p v-else >Out of Stock </p>
                    </div>

                    <div >
                        <h3> Looping Throw Object Properties:</h3><br>
                        <p v-for="(value,property,index) in student">@{{index+1}}. @{{property}}: @{{value }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div >
                        <h3> Understanding the v-for update Stretegy</h3>
                        <ul>
                            <li v-for="person in persons">@{{ person.name}}  (ID:@{{person.id}})</li>
                        </ul>
                        <button v-on:click="addNewPerson()"> Add New Person</button>
                    </div>
                </div>
            </div>
            <div class="row" style="border: 1px solid black"></div>
            <div class="row">
                <div class="col-md-6">
                    <h3>Change Array Detection</h3>
                    <p v-for="list in lists">@{{list}}</p>
                    <button v-on:click="changeArrayValue" class="btn btn-info btn-sm">Change Array Value Using Vue.set()</button>
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
                movieName:'Fast And Furious',
                itemInStock:0,
                age:27,
              lists:['HTML','Javascript','Jquery','PHP','Laravel'],
                skills:[
                    {name:'HTML',experience:3},
                    {name:'CSS',experience:2},
                    {name:'Bootstrap',experience:2},
                    {name:'Javascript',experience:3},
                    {name:'Jquery',experience:1},
                    {name:'PHP',experience:2},
                    {name:'Laravel',experience:1},
                ],
                show:false,

                student:{
                    Name:'SM SHIPON',
                    Class:'Six',
                    Roll:10,
                },
                persons:[
                    {id: 1,name: 'Robinson'},
                    {id: 2,name: 'Morrison'},
                    {id: 3,name: 'Devid'}
                ]
            },

            methods: {
                addNewPerson: function () {
                    var heighestId = Math.max.apply(Math, this.persons.map(function (p) {
                        return p.id;
                    }));
                    var names = ['Michael', 'Steve', 'Peter', 'Ven Stock'];
                    this.persons.push({
                        id: heighestId + 1,
                        name: names[Math.floor(Math.random() * names.length)]
                    });
                },
                changeArrayValue:function () {
                   Vue.set(this.lists,2,'Bootstrap');
                }
            }

        });
    </script>


@stop