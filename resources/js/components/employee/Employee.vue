<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left"> <i class="fa fa-check-square-o"></i>Create Employee</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Employee</li>
                    </ol>
                    <div class="clearfix">
                        <div class=" col-4 offset-4" >

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 col-xl-5 ">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-check-square-o"></i> Create Employee</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class=" col-md-6 form-group ">
                                    <label>Username:</label>
                                    <input type="text"  v-model="name" class="form-control">
                                </div>
                                <div class="col-md-6 form-group ">
                                    <label>Phone:</label>
                                    <input type="text"  v-model="phone" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 form-group  ">
                                    <label>Email:</label>
                                    <input type="text"  v-model="email" class="form-control">
                                </div>
                                <div class="col-md-6 form-group ">
                                    <label>Address:</label>
                                    <input type="text"  v-model="address" class="form-control">
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary"> Save </button>
                        </form>
                    </div>
                </div><!-- end card-->
            </div>


            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h3><i class="fa fa-table"></i> Employee List</h3>

                            </div>

                        </div>

                    </div>

                    <div class="card-body" id="collapseExample" >

                        <div class="table-responsive table-bordered">
                            <table class="table table-hover  table-striped">
                                <thead>
                                <tr>
                                    <th>SL </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="pull-right">
                        </div>
                    </div>

                </div><!-- end card-->
            </div>
        </div>
        <!-- END container-fluid -->
    </div>
</template>

<script>
    export default {

        data(){
            return{
                employees:[],
                name:'',
                phone:'',
                email:'',
                address:'',
            }
        },
        mounted() {
            console.log('Component mounted.')

        },

        methods:{

        }
    }
</script>
