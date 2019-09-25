/*jshint esversion: 6 */
/* jshint node: true */
/*globals $:true */


$("#shipon").click(function(){
    "use strict";
    fetch('https://jsonplaceholder.typicode.com/users')
        .then((response) => {
            return response.json();
        })
        .then((data) => {

            let html = "";
            data.forEach(employee => {
                html += `
               <tr>
               <td class="text-center"> ${employee.name}</td>
               <td class="text-center"> ${employee.name}</td>
               
               </tr>`;
            });
            document.getElementById("user_data").innerHTML = html;
        })
        .catch((err) => console.log(err));
    });



// $("#shipon").click(function(){
//     fetch('https://jsonplaceholder.typicode.com/users')
//         .then((response) => {
//             return response.json();
//         })
//         .then((data) => {
//             const lis = data.map(list => {
//                 let li = document.createElement('li');
//                 let text = `Name : ${list.name} , Email: ${list.email}`;
//                 let textNode = document.createTextNode(text);
//
//                 li.appendChild(textNode)
//                 return li;
//             });
//
//             lis.forEach((li) => {
//                 document.getElementById('user_data').appendChild(li);
//             })
//         })
//         .catch((err) => console.log(err))
// });
//
