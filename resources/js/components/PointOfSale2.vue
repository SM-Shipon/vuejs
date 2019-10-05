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

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h3><i class="fa fa-table"></i> Cart List</h3>
                            </div>
                            <div class="col-md-2 text-right">
                                <button type='button' class="btn btn-info btn-sm" @click="addNewRow">  ADD ROW  </button>
                            </div>

                        </div>

                    </div>

                    <div class="card-body" id="collapseExample" >
                        <div class="table-responsive table-bordered">
                            <table class="table table-hover  table-striped">
                                <thead>
                                <tr>
                                    <th> Product Code</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Qty </th>
                                    <th>Total </th>
                                    <th>Action </th>
                                </tr>
                                </thead>


                                <tr v-for="(invoice_product, k) in invoice_products" :key="k">
                                    <td>
                                        <input class="form-control" type="text" v-model="invoice_product.product_no" />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" v-model="invoice_product.product_name" />
                                    </td>
                                    <td>
                                        <input class="form-control text-right" type="number" min="0" step=".01" v-model="invoice_product.product_price" @change="calculateLineTotal(invoice_product)"/>
                                    </td>
                                    <td>
                                        <input class="form-control text-right" type="number" min="0" step=".01" v-model="invoice_product.product_qty" @change="calculateLineTotal(invoice_product)"/>
                                    </td>
                                    <td>
                                        <input readonly class="form-control text-right" type="number" min="0" step=".01" v-model="invoice_product.line_total" />
                                    </td>
                                    <td >
                                        <span class="btn btn-danger btn-md" @click="deleteRow(k, invoice_product)" >Remove</span>
                                    </td>
                                </tr>
                                <tr v-show="invoice_products.length === 0">
                                    <td colspan="6">
                                        <p class="text-center alert-danger p-2">
                                            No products added/available.
                                        </p>
                                    </td>
                                </tr>
                                <tfoot>
                                <tr>
                                    <td colspan="4" class="">Subtotal</td>
                                    <td class="">{{invoice_subtotal}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="">Tax</td>
                                    <td class="">{{invoice_tax}}%</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="">Total</td>
                                    <td class="">{{invoice_total}}</td>
                                </tr>
                                </tfoot>

                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="pull-right">
                            <button type='button' class="btn btn-info btn-sm" @click="saveInvoice"> Save</button>

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
            return{
                invoice_subtotal: 0,
                invoice_total: 0,
                invoice_tax: 5,
                invoice_products: [{
                    product_no: '',
                    product_name: '',
                    product_price: '',
                    product_qty: '',
                    line_total: 0
                }]
            }

        },

            methods: {
                saveInvoice() {
                    console.log(JSON.stringify(this.invoice_products));
                },
                calculateTotal() {
                    let subtotal, total;
                    subtotal = this.invoice_products.reduce(function (sum, product) {
                        let lineTotal = parseFloat(product.line_total);
                        if (!isNaN(lineTotal)) {
                            return sum + lineTotal;
                        }
                    }, 0);

                    this.invoice_subtotal = subtotal.toFixed(2);

                    total = (subtotal * (this.invoice_tax / 100)) + subtotal;
                    total = parseFloat(total);
                    if (!isNaN(total)) {
                        this.invoice_total = total.toFixed(2);
                    } else {
                        this.invoice_total = '0.00'
                    }
                },
                calculateLineTotal(invoice_product) {
                    let total = parseFloat(invoice_product.product_price) * parseFloat(invoice_product.product_qty);
                    if (!isNaN(total)) {
                        invoice_product.line_total = total.toFixed(2);
                    }
                    this.calculateTotal();
                },
                deleteRow(index, invoice_product) {
                    let idx = this.invoice_products.indexOf(invoice_product);
                    console.log(idx, index);
                    if (idx > -1) {
                        this.invoice_products.splice(idx, 1);
                    }
                    this.calculateTotal();
                },
                addNewRow() {
                    this.invoice_products.push({
                        product_no: '',
                        product_name: '',
                        product_price: '',
                        product_qty: '',
                        line_total: 0
                    });
                }
            }
        }


</script>
