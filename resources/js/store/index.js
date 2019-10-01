/*jshint esversion: 6 */
/* jshint node: true */
"use strict";
const axios = require('axios');
export default {
    state:{
        students:[],
        employees:[],
        countries:[],
        districts:[],
        cities:[],
    },
    getters:{
        getStudent(state){
            return state.students;
        },

        getEmployee(state){
            return state.employees;
        },
        getCountry(state){
            return state.countries;
        },
        getDistrict(state){
            return state.districts;
        },
        getCity(state){
            return state.cities;
        }
    },
    actions:{
        allStudent(context){
            axios.post('/student-view')
                .then((response)=>{
                    context.commit('students',response.data.students);//students comes from controller
                });

        },
        allEmployee(context){
            axios.post('/employee-view')
                .then((response)=>{
                    context.commit('employees',response.data.employees);//students comes from controller
                });
        },
        allCountry(context){
            axios.post('/get-country')
                .then((response)=>{
                    context.commit('countries',response.data.countries);//students comes from controller
                });
        },
        allDistrict(context){
            axios.post('/district')
                .then((response)=>{
                    context.commit('districts',response.data.districts);//students comes from controller
                });
        },
        allCity(context){
            axios.post('/city-view')
                .then((response)=>{
                    context.commit('cities',response.data.cities);//students comes from controller
                });
        }
    },

    mutations:{
        //students() comes from actions
        students(state, payload){
            return state.students = payload;
        },
        employees(state, payload){
            return state.employees = payload;
        },

        countries(state, payload){
            return state.countries = payload;
        },
        cities(state, payload){
            return state.cities = payload;
        },
        districts(state, payload){
            return state.districts = payload;
        },
    }

};