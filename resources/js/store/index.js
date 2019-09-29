/*jshint esversion: 6 */
/* jshint node: true */
"use strict";
const axios = require('axios');
export default {
    state:{
        students:[],
        employees:[],
    },
    getters:{
        getStudent(state){
            return state.students;
        },

        getEmployee(state){
            return state.employees;
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
    }

};