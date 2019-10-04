<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left"> <i class="fa fa-check-square-o"></i>Point Of Sale</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active"> Point Of Sale</li>
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
                        <h3><i class="fa fa-check-square-o"></i> Point Of Sale</h3>

                    </div>
                    <div class="card-body">
                        <form   class="needs-validation" id="validated-form"  @submit.prevent="addToCart">
                            <div class="form-row">
                                <div class=" col-md-6 form-group ">
                                    <label>Name:</label>
                                    <input type="text"  v-model="name" name="name" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 form-group ">
                                    <label>Phone:</label>
                                    <input type="text"  v-model="phone" name="phone" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 form-group ">
                                    <label>Email:</label>
                                    <input type="text"  v-model="email" name="email" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 form-group ">
                                    <label>Address:</label>
                                    <input type="text"  v-model="address" name="address" class="form-control" required>


                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" > Add To Cart </button>
                        </form>
                    </div></div><!-- end card-->
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h3><i class="fa fa-table"></i> Cart List</h3>

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
                                </tr>
                                </thead>

                                <tr v-for="(data, i) in rowData">
                                    <td>{{i+1}}</td>
                                    <td>{{data.name}}</td>
                                    <td>{{data.phone}}</td>
                                    <td>{{data.email}}</td>
                                    <td>{{data.address}}</td>

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
                name: '',
                phone: '',
                email: '',
                address: '',
                rowData:[] //the declared array

            }
        },
        mounted() {
            console.log('Component mounted.')

        },

        computed:{

        },

        methods:{
            addToCart(){
                let my_object = {
                name: this.name,
                email: this.email,
                address: this.address,
                phone: this.phone,
            };
            this.rowData.push(my_object)
            this.name = '';
            this.email = '';
            this.address = '';
            this.phone = '';


            },
        }


    }
</script>
