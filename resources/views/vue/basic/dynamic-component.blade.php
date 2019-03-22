@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4 Admin Template')

@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Dynamic Component</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item ">Dynamic Component</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row" id="root">
                <div class="col-xl-12">
                    <div id="" class="demo">
                        {{--<button v-for="tab in tabs" v-bind:key="tab" v-bind:class="['tab-button', { active: currentTab === tab }]" v-on:click="currentTab = tab">@{{ tab }}</button>--}}
                        <button v-for="tab in tabs" :class="['tab-button']" @click="currentTab = tab">@{{ tab }}</button>

                        <component v-bind:is="currentTabComponent" class="tab"></component><br>
                    </div>
                </div>
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

        .tab-button {
            padding: 6px 10px;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            border: 1px solid #ccc;
            cursor: pointer;
            background: #f0f0f0;
            margin-bottom: -1px;
            margin-right: -1px;
        }

        .tab-button:hover {
            background: #e0e0e0;
        }

        .tab-button.active {
            background: #e0e0e0;
        }

        .tab {
            border: 1px solid #ccc;
            padding: 10px;
        }


    </style>
@stop

@section('script')

    <script type="text/javascript">
        Vue.component('tab-home', {
            template: '<div>Home component</div>'
        })
        Vue.component('tab-posts', {
            template: '<div>Posts component</div>'
        })
        Vue.component('tab-archive', {
            template: '<div>Archive component</div>'
        })


        var app = new Vue({
            el: '#root',
            data: {
                currentTab: 'Home',
                tabs: ['Home', 'Posts', 'Archive']
            },
            computed: {
                currentTabComponent: function() {
                    return 'tab-' + this.currentTab.toLowerCase()
                }
            }
        });
    </script>




@stop