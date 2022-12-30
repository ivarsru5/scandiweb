const massDelite = document.getElementById("delete");

window.addEventListener("load", function(){
    //At this point function calls asynchronously should append new <ul> to table with 'appendChild()' method
    //as it inserts new element at the last index.
    ajaxCall("backend/dvdClass.php", 'dvdList', 'dvdProducts', 'Memory (MB): ', function(){
        ajaxCall("backend/furniClass.php", 'furniList', 'furniProducts', 'Dimensions: ', function(){
            ajaxCall("backend/bookClass.php", 'bookList', 'bookProducts', 'Wight (KG): ', function(){
                return;
            });
        });
    });
});

massDelite.addEventListener("click", () => {
    let dvdDel = [];
    let furniDel = [];
    let bookDel = [];

    let parent = document.querySelector("#listView");
    let children = parent.children;

    Array.from(children).forEach( ul => {
        switch(ul.className){
            case "dvdList":
                collectDelited(ul, dvdDel);
                openAjaxOnDelite("backend/dvdClass.php",dvdDel);
                console.log(dvdDel);
                break;
            case "furniList":
                collectDelited(ul, furniDel);
                openAjaxOnDelite("backend/furniClass.php", furniDel);
                console.log(furniDel);
                break;
            case "bookList":
                collectDelited(ul, bookDel);
                openAjaxOnDelite("backend/bookClass.php", bookDel);
                console.log(bookDel);
                break
        }
    });
});

//Gets all of checked elements and calls '.push()' on given array to store sku
function collectDelited(ul, inputArray){
    let line = ul.children;
    Array.from(line).forEach( element =>{
        let checkBox = element.querySelector('#check');
        if(checkBox.checked){
            let skuValue = element.querySelector('p[id="sku"]').textContent;
            const value = skuValue.split(" ");
            inputArray.push(value[1]);
        }
    });
}

function openAjaxOnDelite(phpFile ,delArray){
    let xml = new XMLHttpRequest();
    xml.open("POST", phpFile, true);
    xml.onload = () => {
        if(xml.readyState == 4 && xml.status == 200){
            window.location.reload();
        }
    }
    //xml.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xml.setRequestHeader( "Content-Type", "application/json" );
    xml.send(JSON.stringify(delArray));
}

//On screen load we call ajax method to get JSON data from .php files.
function ajaxCall(phpFile, listName, productsName, specific, callback){
    let xml = new XMLHttpRequest();
    xml.open("GET", phpFile, false);
    xml.onload = () => {
        if(xml.readyState == 4 && xml.status == 200){
            let response = xml.response;
            if(response != 0){
                let collectedArray = JSON.parse(response);
                createTables(collectedArray, listName, productsName, specific)
            }
        }
    }
    xml.send();
    callback();
}

//With help of javaScript creating Tables to display data we recived from sql server.
//Looping threw each recived element and creating table for it.
function createTables(forArray, listName, productsName, specific){
    const table = document.getElementById("listView");
    let list = document.createElement('ul');
    list.setAttribute('class', listName);


    forArray.forEach(element => {
        let li = document.createElement('li');
        li.setAttribute('class', productsName);

        let checkBox = document.createElement('input');
        checkBox.setAttribute('type', 'checkbox');
        checkBox.setAttribute('id', 'check');

        let sku = document.createElement('p');
        sku.setAttribute('id', 'sku');
        sku.innerHTML = "SKU: " + element.SKU;

        let name = document.createElement('p');
        name.innerHTML = "Name: " + element.Name;

        let price = document.createElement('p');
        price.innerHTML = "Price($): " + element.Price;

        let memory = document.createElement('p');
        memory.innerHTML = specific + element.Spec;

        li.append(checkBox, sku, name, price, memory);
        list.appendChild(li);
    });
    table.appendChild(list);
}