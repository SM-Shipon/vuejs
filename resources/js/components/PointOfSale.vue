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
                                <div class=" col-md-12 form-group ">
                                    <label>Product Code:</label>
                                    <input type="text"  v-model="pro_code"  class="form-control" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 form-group ">
                                    <label>Product Name:</label>
                                    <input type="text"  v-model="pro_name"  class="form-control" required>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-12 form-group ">
                                    <label>Price:</label>
                                    <input type="text"  v-model="price"  class="form-control" required>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-12 form-group ">
                                    <label>Quantity:</label>
                                    <input type="text"  v-model="qty" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center ">
                                    <button type="submit" class="btn btn-primary text-right" > Add To Cart </button>
                                </div>
                            </div>
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

                        <div class="table-responsive ">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                <tr>
                                    <!--<th>SL </th>-->
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                <tr v-for="(data, i) in cartData">
                                    <!--<td>{{i+1}}</td>-->
                                    <td><input type="text"  :value='data.pro_code' class="form-control" readonly></td>
                                    <td><input type="text"  :value='data.pro_name' class="form-control" readonly></td>
                                    <td><input type="text"  :value='data.price' class="form-control"></td>
                                    <td><input type="text"  :value='data.qty' class="form-control"></td>
                                    <td><input type="text"  :value='data.price *data.qty' class="form-control" readonly></td>
                                    <td >
                                        <span class="btn btn-danger delete-btn" @click="deleteRow(i)" >Remove</span>
                                    </td>

                                </tr>

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
                cartData : [],
                employees : null,
                action : false,
                pro_code: '',
                pro_name: '',
                price: '',
                qty: '',
//                rowData:[],//the declared array
               //the declared array


            }
        },
        mounted() {
            console.log('Component mounted.')
            this.cartData =JSON.parse(localStorage.getItem('dataStore'));


        },

        methods:{

            addToCart(){

                let my_object = {
                    pro_code: this.pro_code,
                    pro_name: this.pro_name,
                    price: this.price,
                    qty: this.qty,
            };

                this.cartData.push(my_object);
                this.pro_code = '';
                this.pro_name = '';
                this.price = '';
                this.qty = '';
                localStorage.setItem('dataStore',JSON.stringify(this.cartData));

            },

            deleteRow(index){
                this.cartData.splice(index, 1);
                localStorage.setItem('dataStore',JSON.stringify(this.cartData));
            }
        }


    }
</script>
<style>
    .table thead th {

        border: 1px solid #000;
        font-size: 14px;
        background: #A6A8A7;
        color: #000;
        font-weight: bold;
    }

    .table tbody td {
        border: 1px solid #A6A8A7;
        font-size: 13px;
        /*background: #f8f8f8;*/
        color: #000;
        padding: 5px 8px 5px 8px;

    }
    .table td, .table th {
        padding: .40rem;
        vertical-align: top;
        border-top: 1px solid #A6A8A7;
        font-size: 14px;
        text-transform: none;
        text-align: center;
    }

    .assign-btn, .update-btn , .delete-btn{
        padding-top: 2px;
        padding-bottom: 2px;
    }

    .vh-100 {
        min-height: 100vh;
    }
    textarea.form-control{
        height:50px;
    }
    input.form-control{
        height:30px;
        text-align:center;
    }


</style>
