<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left"> <i class="fa fa-check-square-o"></i>Create Student</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Student</li>
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
                        <h3><i class="fa fa-check-square-o"></i> Create Student</h3>
                    </div>
                    <div class="card-body">
                        <form id="myForm">
                            <div class="form-row">
                                <div class=" col-md-6 form-group ">
                                    <label>Username:</label>
                                    <input type="text"  v-model="form.name" name="name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                                <div class="col-md-6 form-group ">
                                    <label>Phone:</label>
                                    <input type="text"  v-model="form.phone" name="phone" class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                                    <has-error :form="form" field="phone"></has-error>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 form-group  ">
                                    <label>Address:</label>
                                    <input type="text"  v-model="form.address" class="form-control" :class="{ 'is-invalid': form.errors.has('address') }">
                                    <has-error :form="form" field="address"></has-error>
                                </div>
                                <div class="col-md-6 form-group ">
                                    <label>Roll:</label>
                                    <input type="text"  v-model="form.roll" class="form-control" :class="{ 'is-invalid': form.errors.has('roll') }">
                                    <has-error :form="form" field="roll"></has-error>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary" @click.prevent="storeStudent()" > Save </button>
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

                                <tr v-for="student in students">
                                    <td>{{student.name}}</td>
                                    <td>{{student.phone}}</td>
                                    <td>{{student.address}}</td>
                                    <td>{{student.roll}}</td>
                                    <td>
                                        <a :href="'student-edit/'+student.id">Edit</a> | <a href="javascript:;" @click.prevent="studentDelete(student.id, index)">Delete</a>
                                    </td>
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
        name: "Student",

        data(){
            return {
                students : {},
                form: new Form({
                    name: '',
                    phone: '',
                    address: '',
                    roll: ''
                })
            }
        },

        mounted() {
            console.log('Component mounted.')
            this.getStudent();

        },

        methods:{

            getStudent() {
                axios.get('/student-view')
                    .then(response => {
//                        this.students = response.data;
//                        console.log( this.students);
                    });
            },

            storeStudent(){

                console.log('click save work')

                this.form.post('/student-store')
                    .then((response)=>{
                        Object.assign(this.$data, this.$options.data.call(this));//reset form
                        console.log(response.data);

                            this.$router.push('/student');
                        toast.fire({
                            type: 'success',
                            title: 'Student Added successfully'
                        });
                    })
                    .catch(()=>{

                    })
            },



//
//            studentDataSave(){
//                console.log('click save work')
//                axios.post('/student-store', {
//                    name: this.name,
//                    phone: this.phone,
//                    address: this.address,
//                    roll: this.roll,
//                })
//                    .then(function (response) {
//                        console.log(response,'then');
////                        location.reload();
//                    })
//                    .catch(function (error) {
//                        console.log(error,'error');
//                    });
//            },
//
//            studentDelete(id, index){
////                alert('are you want to delete this?')
//                axios.post('/student-delete/'+id, {
//                })
//                    .then(function (response) {
//                        this.students.data.splice(index, id);
//                        location.reload();
//                    })
//                    .catch(function (error) {
//                        console.log(error,'eorro');
//                    });
//            },


        }


    }
</script>
