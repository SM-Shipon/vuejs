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
                        <h3 v-if="action"><i class="fa fa-check-square-o"></i> Edit City</h3>
                        <h3 v-else><i class="fa fa-check-square-o"></i> Add City</h3>
                    </div>
                    <div class="card-body">
                        <form id="myForm" enctype="multipart/form-data">
                            <div class="form-row">
                                <label>Country:</label>
                                <div class=" col-md-12 form-group ">
                                    <select v-on:change="onChange" class="form-control" :class="{ 'is-invalid': form.errors.has('country_id') }" v-model="form.country_id">
                                        <option disabled value="">Select Country</option>
                                        <option :value="country.id" v-for="country in getAllCountry"> {{country.name}}</option>

                                    </select>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class=" col-md-12 form-group ">
                                    <label>District:</label>
                                    <select  name="district" class="form-control" :class="{ 'is-invalid': form.errors.has('district_id') }" v-model="form.district_id">
                                        <option disabled value="">Select District</option>
                                        <option :value="district.id" v-for="district in districts">{{district.name}}</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 form-group ">
                                    <label>City:</label>
                                    <input type="text"  v-model="form.name"  class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                            </div>

                            <button v-if="action" type="submit" class="btn btn-primary" @click.prevent="updateCity(cityId)" > Update </button>
                            <button v-else type="submit" class="btn btn-primary" @click.prevent="storeCity" > Save </button>
                        </form>
                    </div></div><!-- end card-->
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h3><i class="fa fa-table"></i> City List</h3>

                            </div>

                        </div>

                    </div>

                    <div class="card-body" id="collapseExample" >

                        <div class="table-responsive table-bordered">
                            <table class="table table-hover  table-striped">
                                <thead>
                                <tr>
                                    <th>SL </th>
                                    <th>Country</th>
                                    <th>District</th>
                                    <th>City</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tr v-for="(city, i) in getAllCity">
                                    <td>{{i+1}}</td>
                                    <td v-if="city.country">{{city.country.name}}</td>
                                    <td v-if="city.district">{{city.district.name}}</td>
                                    <td>{{city.name}}</td>
                                    <td>
                                      <a href="javascript:;" @click.prevent="editCity(city.id)">Edit</a> | <a href="javascript:;" @click.prevent="cityDelete(city.id)">Delete</a>
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
        name: "City",

        data(){
            return {
                countries : null,
                districts : null,
                action : false,
                cityId :null,
                form: new Form({
                    country_id: '',
                    district_id: '',
                    name: '',


                })
            }
        },
        mounted() {

            this.$store.dispatch("allCountry")
            this.$store.dispatch("allCity")

        },

        computed:{

            getAllCountry(){
                return this.$store.getters.getCountry
            },

            getAllCity(){

                return this.$store.getters.getCity

            }
        },

        methods:{

            onChange(event) {
                let country_id = this.form.country_id;
               axios.get('get-district/'+country_id)
                   .then((response)=>{
                      this.districts= response.data.districts;
                       console.log(response.data.districts);
                   })

            },
            storeCity(){
                this.form.post('/store-city')
                    .then((response)=>{
                        Object.assign(this.$data, this.$options.data.call(this));//reset form
                        this.$store.dispatch("allCity")
                        console.log(response.data);
                        //this.$router.push('/student'); //redirect to another component ,here '/student' is route
                        toast.fire({
                            type: 'success',
                            title: 'City Added successfully'
                        });
                    })
                    .catch(()=>{

                    })

            },

            editCity(id){
                axios.get('/city-edit/'+id)
                    .then( (response) =>{
                        console.log(response.data.action);
                        this.form.fill(response.data.city)
                        this.action = true;
                        this.cityId = response.data.city.id;
                        this.$store.dispatch("allCity")
                    })
            },
            updateCity(id){
                this.form.post('/city-update/'+id)
                    .then( () =>{
                        Object.assign(this.$data, this.$options.data.call(this));//reset form
                        this.$store.dispatch("allCity")
                        this.action =false;
                        toast.fire({
                            type: 'success',
                            title: 'City Updated successfully'
                        })
                    })

            },
            deleteCity(id){
                axios.get('/city-delete/'+id)
                    .then( () =>{
                        Object.assign(this.$data, this.$options.data.call(this));//reset form
                        this.$store.dispatch("allCity")
                        this.action = false;
                        toast.fire({
                            type: 'success',
                            title: 'City Deleted successfully'
                        })
                    })

            },
        }


    }
</script>
