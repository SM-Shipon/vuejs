/*jshint esversion: 6 */
/*jslint evil: true */
/* jshint node: true */
/*globals $:true */

require('./promise');
const a= 40;
const b=50;

const sum =a+b;
// document.getElementById("promise").innerHTML = sum;

console.log(sum);

const arr =()=>{
    "use strict";
    document.write("Hello World");
};

arr();