@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4 Admin Template')

@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Components </h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item ">Components </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <br>
            <div class="row" id="root">

                <div col-md-4> <div class="container"> <button class="btn btn-warning" @click="showModal = true">Show Modal</button></div></div>

                <div col-md-4>
                    <modal>
                        <template slot="header">
                            <h4 class="modal-title">Modal Header </h4>
                        </template>
                        <template slot="body">
                            <div class="row">
                                <div class="col-md-2"> <label>Name:</label></div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </template>
                        <template slot="footer">
                            <button class="btn btn-success btn-md">Save</button>
                        </template>
                    </modal>
                    <br>
                </div>

                <show-modal  v-if="showModal" @onsave="showModal = false" >
                    <template slot="header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" @click="showModal = false">&times;</button>

                    </template>
                    <template slot="body">
                        <div class="row">
                            <div class="col-md-2"> <label>Name:</label></div>
                            <div class="col-md-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </template>
                    <template slot="footer">
                     {{--<button class="btn btn-success btn-md" @click="showModal = false">Save</button>--}}

                        <button type="button" class="btn btn-danger" @click="showModal = false">Close</button>
                    </template>
                </show-modal><br>



                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Title</div>
                        <div class="card-body">Content</div>
                        <div class="card-footer">Footer</div>
                    </div>
                    <br>

                    <panel v-if="" title="This is title" content="This is Content This is Content This is Content
                             This is Content This is Content This is Content" footer="This is footer">
                    </panel>
                    <br>

                    <panel   title="This is title1"  footer="This is footer1">
                        <h5>Enter Your Name</h5>
                        <input type="text" class="form-control"><br>
                        <button class="btn btn-info btn-sm"> Submit</button>
                    </panel>
                    <br>

                    <panel title="This is title2"  footer="This is footer2"  >
                        <input type="text" class="form-control"><br>
                    </panel>

                </div>
                <br>
               <div>


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
        Vue.component("show-modal", {
            template:`
                <div class="container">
                    <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                   <slot name="header"></slot>
                                </div>
                                <div class="modal-body">
                                   <slot name="body"></slot>
                                </div>
                                <div class="modal-footer">
                                 <button class="btn btn-success btn-md" @click="$emit('onsave')">Save</button>
                                 <slot name="footer"></slot>
                                </div>
                            </div>
                       </div>
                </div>`,

            data:function () {
                return {

                }
            }
        });
        Vue.component("modal", {
            template:`
                <div class="container">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Open Modal </button>
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                   <slot name="header"></slot>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                   <slot name="body"></slot>
                                </div>
                                <div class="modal-footer">
                                 <slot name="footer"></slot>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`,

            data:function () {
                return {
                    show : true,
                }
            }
        });

        Vue.component("panel", {
        template:`<div class="card" v-if="show" >
             <div class="card-header">@{{title}}
            <button class="float-right btn btn-xs" @click="show = false">X</button>
            </div>
            <div class="card-body">@{{ content }}
            <slot></slot>
            </div>
            <div class="card-footer">@{{ footer }}</div>
            </div>`,
            props:["title","content","footer"],
            data:function () {
                return {
                    show : true,
                }
            }
        });




        var app = new Vue({
            el:"#root",
            data:{
                showModal : false,
            }
        });
    </script>


@stop