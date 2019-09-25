<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left"> <i class="fa fa-check-square-o"></i>Create Student</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Edit Student</li>
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
                        <h3><i class="fa fa-check-square-o"></i> Edit Student</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class=" col-md-6 form-group ">
                                    <label>Name:</label>
                                    <input type="text"  v-model="student.name" class="form-control">
                                </div>
                                <div class="col-md-6 form-group ">
                                    <label>Phone:</label>
                                    <input type="text"  v-model="student.phone" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 form-group  ">
                                    <label>Address:</label>
                                    <input type="text"  v-model="student.address" class="form-control">
                                </div>
                                <div class="col-md-6 form-group ">
                                    <label>Roll:</label>
                                    <input type="text"  v-model="student.roll" class="form-control">
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary" @click.prevent="studentDataUpdate()"> Update </button>
                        </form>
                    </div>
                </div><!-- end card-->
            </div>

            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h3><i class="fa fa-table"></i> Student List</h3>

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
                                    <th>Phone</th>
                                    <th>Roll</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <!--<li v-for="(customer, index) in customers" class="list-group-item">{{ index+1 }} {{ customer.name}} - {{ customer.phone }} <a :href="'customer-edit/'+customer.id">Edit</a> | <a href="javascript:;" @click.prevent="customerDelete(customer.id, index)">Delete</a> </li>-->

                                <tr v-for="student in students">
                                    <td>{{student.name}}</td>
                                    <td>{{student.phone}}</td>
                                    <td>{{student.address}}</td>
                                    <td>{{student.roll}}</td>
                                </tr>

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

        props: ['student'],
        data(){
            return {
                name: '',
                phone: '',
                address: '',
                roll: ''
            }
        },
        mounted() {
            console.log(this.student, 'Component mounted.');
        },
        methods: {
            studentDataUpdate(){
                axios.post('/student-update/' + this.student.id, {
                    name: this.student.name,
                    phone: this.student.phone,
                    address: this.student.address,
                    roll: this.student.roll
                })
                    .then(function (response) {
                        console.log(response, 'then');
                        location = '/student';
                    })
                    .catch(function (error) {
                        console.log(error, 'eorro');
                    });
            }
        },
    }
</script>
