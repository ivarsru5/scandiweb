const selector = document.getElementById("select");
const save = document.getElementById("save");
const switcher = "";


//Logic handler for switcher type, so the correct window is displayed.
selector.addEventListener('change', (event) =>{
    const dvd = document.getElementById("dvd");
    const furniture = document.getElementById("furniture");
    const book = document.getElementById("book");

    this.switcher = event.target.value;

    if(this.switcher != null){
        dvd.style.display = 'none'; 
        furniture.style.display = 'none'; 
        book.style.display = 'none'; 
    } 

    //Object literal gets called each time event happens, and returns new value of view.
    const SwitcherView = {
        dvd: function (){
            dvd.style.display = "block"
        },
        furniture: function(){
            furniture.style.display = "block"
        },
        book: function(){
            book.style.display = "block"
        }
    }

    SwitcherView[this.switcher]();  
});

//Function validates input fields, so they would match requested.
save.addEventListener("click", (event) => {
    event.preventDefault()
    const sku = document.getElementById("sku").value;
    const name = document.getElementById("name").value;
    const price = document.getElementById("price").value;

    validateFields(sku, name, price)
});

function validateFields(sku, name, price){
    const form = document.querySelector("form");
    let validate = /^[A-Za-z\s0-9]*$/;
    let validatePrice = /^[0-9]+(\.[0-9]+)?$/;

    const FileSelection = {
        dvd : "backend/dvdProduct.php",
        furniture : "backend/furniProduct.php",
        book : "backend/bookProduct.php"
    }

    //Function check for correct input with .value() call
    //If it returns 'true' it proceedss with further validation of additional fields that change dynamically.
    //When all fields have passed validation function begins to POST FormData to PHP file for backend work.
    if(validate.test(sku) && validate.test(name) && validatePrice.test(price)){
        //if(validateAdditional(this.switcher)){
            let xml = new XMLHttpRequest();
            xml.open("POST", FileSelection[this.switcher], true);
            xml.onload = () => {
                if(xml.readyState == 4 && xml.status == 200){
                    let response = xml.response;
                    alert(response);
                    form.reset()
                    window.location.replace("productList.php");
                }
            }
            console.log(form);
            let formData = new FormData(form);
            xml.send(formData);
       //}
    }else{
        alert("Please check if there is not any spaces or special characters added");
    }
}

//Function validates field/fields by users input choice.
//Object SwitcherValidation() takes functions input to manage whitch view currently is displayed
//And then from either returns 'true' to proceed or an alert.
function validateAdditional(type){
    const dvdMemory = document.getElementById("dvd-memory").value;
    const height = document.getElementById("height").value;
    const width = document.getElementById("width").value;
    const lenght = document.getElementById("lenght").value;
    const weight = document.getElementById("weight").value;

    const validate =/^[0-9]+(\.[0-9]+)?$/;

    const SwitcherValidation = {
        dvd: function(){
            return validate.test(dvdMemory) ? true : alert("Incorrect MB memmory input");
        },
        furniture: function(){
            return validate.test(height) && validate.test(width) && validate.test(lenght) ? true : alert("Please check all entered dimensions for furniture.");
        },
        book: function(){
            return validate.test(weight) ? true : alert("Please enter correct value for weight.");
        }
    }

    SwitcherValidation[type]();
}