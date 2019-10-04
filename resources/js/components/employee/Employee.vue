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
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 v-if="action"><i class="fa fa-check-square-o"></i> Edit Employee</h3>
                        <h3 v-else><i class="fa fa-check-square-o"></i> Create Employee</h3>
                    </div>
                    <div class="card-body">
                        <form id="myForm" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class=" col-md-6 form-group ">
                                    <label>Name:</label>
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
                                    <label>Email:</label>
                                    <input type="text"  v-model="form.email" name="email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                    <has-error :form="form" field="email"></has-error>

                                </div>
                                <div class="col-md-6 form-group ">
                                    <label>Address:</label>
                                    <input type="text"  v-model="form.address" name="address" class="form-control" :class="{ 'is-invalid': form.errors.has('address') }">
                                    <has-error :form="form" field="address"></has-error>

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-8 form-group ">
                                    <label>Image:</label>

                                    <input v-on:change="onChange($event)" ref="myFileInput" name="form.image" type="file" :class="{ 'is-invalid': form.errors.has('image') }">
                                    <has-error :form="form" field="image"></has-error>
                                </div>
                                <div class="col-md-4 form-group ">
                                    <img v-if="editImage"  :src="updateImage()" alt="" width="80" height="60">
                                    <img v-else :src="form.image" alt="" width="80" height="60">
                                </div>
                            </div>

                            <button v-if="action" type="submit" class="btn btn-primary" @click.prevent="updateEmployee(employeeId)" > Update </button>
                            <button v-else type="submit" class="btn btn-primary" @click.prevent="storeEmployee" > Save </button>
                        </form>
                    </div></div><!-- end card-->
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
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
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tr v-for="(employee, i) in getAllEmployee">


                                <td>{{i+1}}</td>
                                <td>{{employee.name}}</td>
                                <td>{{employee.phone}}</td>
                                <td>{{employee.email}}</td>
                                <td>{{employee.address}}</td>
                                    <td><img :src="fetchImage(employee.image)" alt="" width="40" height="30"></td>
                                    <td>
                                <a href="javascript:;" @click.prevent="editEmployee(employee.id)">Edit</a> | <a href="javascript:;" @click.prevent="employeeDelete(employee.id)">Delete</a>
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
        name: "Employee",

        data(){
            return {
                employees : null,
                action : false,
                editImage : false,
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

            fetchImage(img){
                return "images/"+img;
            },

            updateImage(){// Display Image When Update
                let img = this.form.image;
                return `images/${this.form.image}`

            },
            onChange(event) {
                let file = event.target.files[0];
                this.editImage = false;
//                this.form.image = event.target.files[0];
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.image = event.target.result;
                    console.log(this.form.image)
                };
                reader.readAsDataURL(file);
            },


            storeEmployee(){

                this.form.post('/employee-store')
                    .then((response)=>{
                        Object.assign(this.$data, this.$options.data.call(this));//reset form
                        this.$refs.myFileInput.value = '';//Reset Input File
                        this.$store.dispatch("allEmployee")
                        console.log(response.data);
                        //this.$router.push('/student'); //redirect to another component ,here '/student' is route
                        toast.fire({
                            type: 'success',
                            title: 'Employee Added successfully'
                        });
                    })
                    .catch(()=>{

                    })

            },

            editEmployee(id){
                axios.get('/employee-edit/'+id)
                    .then( (response) =>{
                        console.log(response.data.action);
                        this.form.fill(response.data.employee)
                        this.action = true;
                        this.editImage = true;
                        this.employeeId = response.data.employee.id;
                        this.$store.dispatch("allEmployee")
                    })
            },
            updateEmployee(id){
                this.form.post('/employee-update/'+id)
                    .then( () =>{
                        Object.assign(this.$data, this.$options.data.call(this));//reset form
                        this.$refs.myFileInput.value = '';//Reset Input File
                        this.$store.dispatch("allEmployee")
                        this.action =false;

                        toast.fire({
                            type: 'success',
                            title: 'Employee Updated successfully'
                        })

                    })

            },
            employeeDelete(id){
                axios.get('/employee-delete/'+id)
                    .then( () =>{
                        Object.assign(this.$data, this.$options.data.call(this));//reset form
                        this.form.image= '';
                        this.$store.dispatch("allEmployee")

                        this.action = false;
                        toast.fire({
                            type: 'success',
                            title: 'Employee Deleted successfully'
                        })
                    })

            },
        }


    }
</script>
