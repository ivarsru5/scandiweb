const massDelite = document.getElementById("delete");

window.addEventListener("load", function(){
    ajaxCall('dvdList', 'dvdProducts', 'Memory (MB): ', 'index.php?action=retrive_table&table=get_dvd');
    ajaxCall('furniList', 'furniProducts', 'Dimensions: ','index.php?action=retrive_table&table=get_furni');
    ajaxCall('bookList', 'bookProducts', 'Weight','index.php?action=retrive_table&table=get_book')
});

massDelite.addEventListener("click", () => {
    let dvdDel = [];
    let furniDel = [];
    let bookDel = [];

    const MassDelite = {
        "dvdList": function(){
            collectDelited(ul, dvdDel);
            openAjaxOnDelite("backend/dvdClass.php",dvdDel);
        },
        "furniList": function(){
            collectDelited(ul, furniDel);
            openAjaxOnDelite("backend/Furni.php", furniDel);
        },
        "bookList": function(){
            collectDelited(ul, bookDel);
            openAjaxOnDelite("backend/bookClass.php", bookDel);
        }
    }

    let parent = document.querySelector("#listView");
    let children = parent.children;

    Array.from(children).forEach( ul => {

        MassDelite[ul.className];
        // switch(ul.className){
        //     case "dvdList":
        //         collectDelited(ul, dvdDel);
        //         openAjaxOnDelite("backend/dvdClass.php",dvdDel);
        //         console.log(dvdDel);
        //         break;
        //     case "furniList":
        //         collectDelited(ul, furniDel);
        //         openAjaxOnDelite("backend/furniClass.php", furniDel);
        //         console.log(furniDel);
        //         break;
        //     case "bookList":
        //         collectDelited(ul, bookDel);
        //         openAjaxOnDelite("backend/bookClass.php", bookDel);
        //         console.log(bookDel);
        //         break
        // }
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
function ajaxCall(listName, productsName, specific, path){
    let xml = new XMLHttpRequest();
    xml.open("GET", path, true);
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