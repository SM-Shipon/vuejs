@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4 Admin Template')

@section('content')
	<!-- Start content -->
	<div class="content"  style="min-height: 800px" id="root">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb-holder">
						<h1 class="main-title float-left">Dashboard</h1>
						<ol class="breadcrumb float-right">
							<li class="breadcrumb-item">Home</li>
							<li class="breadcrumb-item active">Dashboard</li>
						</ol>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- end row -->

			<div class="row">
					<h2> Watcher</h2>
				<input class="form-control" type="text" v-model="searchQuery">
				<br><br><br>
				<h3 v-if="isSearching">Searching......</h3>
				<div v-else>
					<ol>
						<li v-for="list in lists">@{{ list  }}</li>
					</ol>
				</div>
			</div>

			<div class="">
				<h3 class="text-center"> Excercise Watcher & Computed Properties </h3>
				 <h5>Computed Property</h5>
				<ol>
					<li v-for="employee in formattedEmployee ">@{{ employee }}</li>
				</ol>

				<button class="btn btn-success btn-sm" v-on:click="addEmployee">Add Employee</button>

			</div>
			<!-- end row -->
		</div>
		<!-- END container-fluid -->
	</div>
	<!-- END content -->
@stop

@section('script')

<script type="text/javascript">
    var app = new Vue({
        el:"#root",
        data:{
			searchQuery:'',
            isSearching:false,
            lists:[],
			employees:[
			    {name:'Rimon', post:'Web Designer'},
			    {name:'Maruf', post:'Wordpress Developer'},
			    {name:'Faisal', post:'Laravel Developer'},
			    ]
        },
		methods:{
            addEmployee:function () {
				this.employees.push(
					{name:"Anik", post:"Graphics Designer "}
				);
            }
		},
       watch:{
           searchQuery:function (query) {
               this.isSearching = true;
               var vm = this;

               setTimeout( function() {
				   vm.lists = ['Java','Python','Ruby'];
                   vm.isSearching = false;

               },3000)
           } ,
           employees:function (employees) {
			   var newEmployee = employees[employees.length - 1];
			   alert(newEmployee.name + '  ( ' +newEmployee.post +')');
           }
	   },
		computed:{
           formattedEmployee:function () {
               return this.employees.map(function (data) {
			  return data.name  + ' ( '+data.post +')' ;
			 })
           }
		}



    });
</script>
@stop
