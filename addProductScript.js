const selector = document.getElementById("select");
const save = document.getElementById("save");
const switcher = null;

selector.addEventListener('change', (event) =>{
    const dvd = document.getElementById("dvd");
    const furniture = document.getElementById("furniture");
    const book = document.getElementById("book");

    if(event.target.value != null){
        dvd.style.display = 'none'; 
        furniture.style.display = 'none'; 
        book.style.display = 'none'; 
    }   

    switch(event.target.value){
        case "dvd":
           dvd.style.display = 'block'; 
           break;
        case "furniture":
            furniture.style.display = 'block';
            break;
        case "book":
            book.style.display = 'block';
            break;
    }
});

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

    if(validate.test(sku) && validate.test(name) && validatePrice.test(price)){
        alert("Done");
        form.reset()
        history.back();
    }else{
        alert("Please check if there is not any spaces or special characters added");
        form.reset();
    }
}