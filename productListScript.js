const massDelite = document.getElementById("delete");
const table = document.getElementById("listView");

//On screen load we call ajax method to get JSON data from .php files
window.addEventListener("load", function(){
    ajaxCall("backend/dvdTable.php", 'dvdList', 'dvdProducts', 'Memory (MB): ');
    ajaxCall("backend/furniTable.php", 'furniList', 'furniProducts', 'Dimensions: ');
    ajaxCall("backend/bookTable.php", 'bookList', 'bookProducts', 'Wight (KG): ');
});

massDelite.addEventListener("click", (event) => {
    event.preventDefault();

    
});

function ajaxCall(phpFile, listName, productsName, specific){
    let xml = new XMLHttpRequest();
    xml.open("GET", phpFile, true);
    xml.onload = () => {
        if(xml.readyState == 4 && xml.status == 200){
            let response = xml.response;
            let storeArray = JSON.parse(response);
            let createdList = createTables(storeArray, listName, productsName, specific);
            table.appendChild(createdList);
        }
    }
    xml.send();
}

//With help of javaScript creating Tables to display data we recived from sql server.
//Looping threw each recived element and creating table for it.
function createTables(forArray, listName, productsName, specific){
    let list = document.createElement('ul');
    list.setAttribute('class', listName);


    forArray.forEach(element => {
        let li = document.createElement('li');
        li.setAttribute('class', productsName);

        let checkBox = document.createElement('input');
        checkBox.setAttribute('type', 'checkbox');

        let sku = document.createElement('p');
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
    return list;
}