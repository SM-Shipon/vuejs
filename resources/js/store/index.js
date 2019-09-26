/*jshint esversion: 6 */
/* jshint node: true */
"use strict";
const axios = require('axios');
    export default {
       state:{
           students:[],
       },
        getters:{
            getStudent(state){
              return state.students;
            }
        },
        actions:{
            allStudent(context){
                axios.get('/student-view')
                    .then((response)=>{
                        context.commit('students',response.data.students);//students comes from controller
                    });

            }
        },

        mutations:{
            //students() comes from actions
            students(state, payload){
                return state.students = payload;
            },
        }

    };