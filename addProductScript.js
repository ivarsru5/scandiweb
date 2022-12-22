const selector = document.getElementById("select");

const dvd = document.getElementById("dvd");
const furniture = document.getElementById("furniture");
const book = document.getElementById("book");

selector.addEventListener('change', (event) =>{
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