@extends('layouts.fixed')
@section('title','Pike Admin - Free Bootstrap 4 Admin Template')

@section('content')
    <!-- Start content -->
    <div class="content" id="root">
        <div class="container-fluid">
            <div class="row" >
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">E-Commerce</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">E-Commerce</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="container-fluid" >
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">
                            <a href="#" class="btn btn-sm btn-success" @click.prevent="isShowingCart = false"><strong>E-commerce</strong></a>
                        </h1>
                        <ol class="breadcrumb float-right">

                            <li class="breadcrumb-item ">
                                <span class="stats btn btn-sm  btn-success">Cart(@{{ cart.items.length }})</span> <span class="btn btn-sm btn-warning">  Total Amount: @{{ cartTotal | currency }}</span>
                                <button class="btn btn-sm btn-primary" @click="isShowingCart = true">View Cart</button></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="container">
                <div class="row" v-if="!isShowingCart">
                    <div class="col-md-4 item" v-for="product in products" style="border: 1px solid #b0d4f1; border-radius: 5px ;padding:10px" >
                        <div class="thumbnail">
                            <img class="group list-group-image" src="http://placehold.it/320x250/000/fff">
                            <div class="caption">
                                <br>
                                <h4 class="group inner list-group-item-heading" style="background-color: #b0d4f1;padding: 5px">@{{ product.name }}</h4>
                                {{--<p class="group inner list-group-item-text">@{{ product.description }}</p>--}}
                                <br>

                                <div class="row flex flex-row align-center" style="padding-left:10px">
                                    <div class="col-xs-4" style="margin-left:0">
                                        <button class="btn btn-success" @click="addProductToCart(product)" :disabled="product.inStock == 0">Add to cart</button>
                                    </div>
                                    <div class="col-md-4" style="margin-top:15px">
                                        <p class="lead">Price: @{{product.price | currency }}</p>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="number-in-stock" :class="{ few: product.inStock < 10 && product.inStock > 0, none: product.inStock == 0 }">
                                            Stock(@{{product.inStock }})
                                        </div>
                                    </div>


                                    {{--<div class="col-xs-6 flex flex-row align-center ">--}}
                                    {{--<div class="number-in-stock" :class="{ few: product.inStock < 10 && product.inStock > 0, none: product.inStock == 0 }">--}}
                                    {{--@{{ product.inStock }} in stock--}}
                                    {{--</div>--}}

                                    {{--<button class="btn btn-success" @click="addProductToCart(product)" :disabled="product.inStock == 0">Add to cart</button>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div v-else>
                    <h1>Cart</h1>
                    <table v-if="cart.items.length > 0" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr v-for="item in cart.items">
                            <td>@{{ item.product.name }}</td>
                            <td>
                                @{{ item.quantity }} &nbsp;
                                <button class="btn btn-success btn-sm" @click="increaseQuantity(item)" :disabled="item.product.inStock == 0">+</button>
                                <button class="btn btn-warning btn-sm" @click="decreaseQuantity(item)">-</button>
                            </td>
                            <td>@{{ item.quantity * item.product.price | currency }}</td>
                            <td><button class="btn btn-danger btn-sm" @click="removeItemFromCart(item)">X</button></td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="3">
                                <strong>Subtotal</strong>
                            </td>
                            <td>@{{ cartTotal | currency }}</td>

                        </tr>
                        <tr>
                            <td class="text-right" colspan="3">
                                <strong>Taxes</strong>
                            </td>
                            <td>@{{ taxAmount | currency }}</td>

                        </tr>
                        <tr>
                            <td class="text-right" colspan="3">
                                <strong>Grand total</strong>
                            </td>
                            <td>@{{ cartTotal + taxAmount | currency }}</td>

                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td  class="text-right"><button class="btn btn-success" @click="checkout">Checkout</button></td>
                        </tr>
                        </tbody>
                    </table>
                    <p v-else>Your cart is currently empty.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- END container-fluid -->
    <!-- END content -->
@stop
@section('css')
    <style>
        .flex { display:flex }
        .flex.flex-column { flex-direction: column; }
        .flex.flex-row { flex-direction: row; }
        .flex.justify-center { justify-content: center; }
        .flex.justify-left { justify-content: flex-start; }
        .flex.justify-right { justify-content: flex-end; }
        .flex.align-center { align-items: center; }
        .flex.align-left { align-items: flex-start; }
        .flex.align-right { align-items: flex-end; }

        /* Navigation */
        #top-navigation a,
        #top-navigation .cart-info {
            width: 100%;
        }

        #top-navigation .cart-info .stats { margin-right: 5px; }

        /* Products */
        #products .item img { background-color: #000; }
        #products .item p.lead { margin-bottom: 0; }
        #products .item .number-in-stock { margin-right: 10px; }
        #products .item .number-in-stock.few { color: #E0A14F; }
        #products .item .number-in-stock.none { color: #C45E5E; }
    </style>
@stop

@section('script')
    <script type="text/javascript">
        new Vue({
            el: '#root',
            data: {
                isShowingCart: false,
                cart: {
                    items: []
                },
                products: [
                    {
                        id: 1,
                        name: 'MacBook Pro (15 inch)',
                        description: 'This laptop has a super crisp Retina display. Yes, we know that it\'s overpriced...',
                        price: 299,
                        inStock: 50
                    },
                    {
                        id: 2,
                        name: 'Samsung Galaxy Note 7',
                        description: 'Unlike the overpriced MacBook Pro, we\'re selling this one a bit cheap, as we heard it might explode...',
                        price: 299,
                        inStock: 755
                    },
                    {
                        id: 3,
                        name: 'HP Laptop ',
                        description: 'This one might not last for so long, but hey, printers never work anyways, right?',
                        price: 149,
                        inStock: 5
                    },
                    {
                        id: 4,
                        name: 'iPhone 7 cover',
                        description: 'Having problems keeping a hold of that phone, huh? Ever considered not dropping it in the first place?',
                        price: 49,
                        inStock: 42
                    },
                    {
                        id: 5,
                        name: 'iPad Pro (9.7 inch)',
                        description: 'We heard it\'s supposed to be pretty good. At least that\'s what people say.',
                        price: 599,
                        inStock: 0
                    },
                    {
                        id: 6,
                        name: 'OnePlus 3 cover',
                        description: 'Does your phone spend most of its time on the ground? This cheap piece of plastic is the solution!',
                        price: 19,
                        inStock: 81
                    }
                ]
            },
            methods: {
                addProductToCart: function(product) {
                    var cartItem = this.getCartItem(product);
                    if (cartItem != null) {
                        var qty= cartItem.quantity++;

                    } else {
                        this.cart.items.push({
                            product: product,
                            quantity: 1
                        });
                    }

                    product.inStock--;
                },
                getCartItem: function(product) {
                    for (var i = 0; i < this.cart.items.length; i++) {
                        if (this.cart.items[i].product.id === product.id) {
                               return this.cart.items[i];
                        }
                    }

                    return null;
                },
                increaseQuantity: function(cartItem) {
                    cartItem.product.inStock--;
                    cartItem.quantity++;
                },
                decreaseQuantity: function(cartItem) {
                    cartItem.quantity--;
                    cartItem.product.inStock++;

                    if (cartItem.quantity == 0) {
                        this.removeItemFromCart(cartItem);
                    }
                },
                removeItemFromCart: function(cartItem) {
                    var index = this.cart.items.indexOf(cartItem);

                    if (index !== -1) {
                        this.cart.items.splice(index, 1);
                    }
                },
                checkout: function() {
                    if (confirm('Are you sure that you want to purchase these products?')) {
                        this.cart.items.forEach(function(item) {
                            item.product.inStock += item.quantity;
                        });

                        this.cart.items = [];
                    }
                }
            },
            computed: {
                cartTotal: function() {
                    var total = 0;

                    this.cart.items.forEach(function(item) {
                        total += item.quantity * item.product.price;
                    });

                    return total;
                },
                taxAmount: function() {
                    return ((this.cartTotal * 10) / 100);
                }
            },
            filters: {
                currency: function(value) {
                    var formatter = new Intl.NumberFormat('en-US', {
                        style: 'currency',
                        currency: 'USD',
                        minimumFractionDigits: 0
                    });

                    return formatter.format(value);
                }
            }
        });
    </script>

@stop