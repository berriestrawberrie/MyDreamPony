const typeFilter = document.querySelector(".filter-type");

//EVENT LISTENER FOR THE FILTER BUTTON
function selectFilter(){

    //APPLY FILTER AND SHOW REMOVE BUTTON
    document.querySelectorAll(".filter")
    .forEach(applyFilter);
}

//USING SELECTION VALUE HIDE ALL OTHER ITEM TYPES
function applyFilter(ele){
    const type = typeFilter.value;
    var female ;
    var male ;

    if(type == "Unicorn"){
        female = 8;
        male = 4;
    }else if(type == "Dragon"){
        female = 1;
        male = 5;
    }else if(type == "Avian"){
        female = 2;
        male = 6;
    }else if(type == "Kittling"){
        female = 3;
        male = 7;
    }else if(type == "All"){
        female = "All";
        male = "All";
    }

    if(!(ele.classList.contains(female)) || !(ele.classList.contains(male)) ){
        ele.style.display = "none";
    }
    if(ele.classList.contains(female) || ele.classList.contains(male)){
        ele.style.display = "block";
    }
}