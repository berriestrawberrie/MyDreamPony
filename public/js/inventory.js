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
    if(!(ele.classList.contains(type))){
        ele.style.display = "none";
    }
    if(ele.classList.contains(type)){
        ele.style.display = "block";
    }
}


function showMenu(id){
   const elem = document.getElementById(id);

   if(!(elem.classList.contains("menushown"))){
    elem.style.display = "block";
    elem.classList.add("menushown");
   }else{
    elem.style.display = "none";
    elem.classList.remove("menushown");
   }
   

}
