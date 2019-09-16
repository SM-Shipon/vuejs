/**
 * Created by SHIPON on 9/15/2019.
 */


    $("#shipon").click(function(){
        fetch('https://jsonplaceholder.typicode.com/users')
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                const lis = data.map(list => {
                    let li = document.createElement('li');
                    let text = `Name : ${list.name} , Email: ${list.email}`
                    let textNode = document.createTextNode(text);

                    li.appendChild(textNode)
                    return li;
                });

                lis.forEach((li) => {
                    document.getElementById('user_data').appendChild(li);
                })
            })
            .catch((err) => console.log(err))
    });


    

