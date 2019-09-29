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
                        <h3 v-if="action"><i class="fa fa-check-square-o"></i> Edit Employee</h3>
                        <h3 v-else><i class="fa fa-check-square-o"></i> Create Employee</h3>
                    </div>
                    <div class="card-body">
                        <form id="myForm" enctype="multipart/form-data">
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
                                <div class="col-md-6 form-group ">
                                    <label>Phone:</label>
                                    <input type="text"  v-model="form.phone" name="phone" class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                                    <has-error :form="form" field="phone"></has-error>
                                </div>
                                <div class="col-md-6 form-group ">
                                        <label>Email:</label>
                                    <input type="text"  v-model="form.email" name="phone" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                    <has-error :form="form" field="email"></has-error>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-8 form-group ">
                                    <label>Image:</label>
                                    <input type="file"  v-on:change="onChange">
                                </div>
                                <div class="col-md-4 form-group ">
                                    <img :src="form.image" width="80px" height="60px">
                                </div>
                            </div>

                            <button v-if="action" type="submit" class="btn btn-primary" @click.prevent="updateEmployee(employeeId)" > Update </button>
                            <button v-else type="submit" class="btn btn-primary" @click.prevent="storeEmployee" > Save </button>
                        </form>
                    </div></div><!-- end card-->
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
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <!--<tr v-for="(employee, i) in getAllEmployee">-->
                                    <!--<td>{{i+1}}</td>-->
                                    <!--<td>{{employee.name}}</td>-->
                                    <!--<td>{{employee.phone}}</td>-->
                                    <!--<td>{{employee.address}}</td>-->

                                    <!--<td>-->
                                        <!--<a href="javascript:;" @click.prevent="editEmployee(employee.id)">Edit</a> | <a href="javascript:;" @click.prevent="employeeDelete(employee.id)">Delete</a>-->
                                    <!--</td>-->
                                <!--</tr>-->

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
        name: "Employee",

        data(){
            return {
                employees : null,
                action : false,
                employeeId :null,
                form: new Form({
                    name: '',
                    phone: '',
                    email: '',
                    address: '',
                    image:''
                })
            }
        },

        mounted() {
            console.log('Component mounted.')
            this.$store.dispatch("allEmployee")

        },

        computed:{
            getAllEmployee(){
                return this.$store.getters.getEmployee
            }
        },

        methods:{
            onChange(event) {
                let file = event.target.files[0];
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.image = event.target.result;
                    console.log(this.form.image)
                };
                reader.readAsDataURL(file);
            },


            storeEmployee(){

                console.log('click save work')

                this.form.post('/employee-store')
                    .then((response)=>{
                        Object.assign(this.$data, this.$options.data.call(this));//reset form
                        console.log(response.data);
                        //this.$router.push('/student'); //redirect to another component ,here '/student' is route
                        toast.fire({
                            type: 'success',
                            title: 'Employee Added successfully'
                        });
                    })
                    .catch(()=>{

                    })
                this.$store.dispatch("allEmployee")

            },




            editEmployee(id){
                axios.get('/employee-edit/'+id)
                    .then( (response) =>{
                        console.log(response.data.action);
                        this.form.fill(response.data.employee)
                        this.action = true;
                        this.employeeId = response.data.employee.id;
                        this.$store.dispatch("allEmployee")
                    })
            },
            updateEmployee(id){
                this.form.post('/employee-update/'+id)
                    .then( () =>{
                        Object.assign(this.$data, this.$options.data.call(this));//reset form
                        this.action =false;
                        toast.fire({
                            type: 'success',
                            title: 'Employee Updated successfully'
                        })
                    })
                this.$store.dispatch("allEmployee")
            },
            employeeDelete(id){
                axios.get('/employee-delete/'+id)
                    .then( () =>{
                        Object.assign(this.$data, this.$options.data.call(this));//reset form
                        this.action = false;
                        toast.fire({
                            type: 'success',
                            title: 'Employee Deleted successfully'
                        })
                    })
                this.$store.dispatch("allEmployee")
            },




        }


    }
</script>
