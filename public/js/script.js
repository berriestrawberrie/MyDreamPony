
//document.addEventListener("DOMContentLoaded",drawPet);
window.onload = drawPet;

function drawPet (){
    //THIS HAS TO BE ESTABLISHED IN PEACE
    const petnames = ["Unicorn","Dragon","Avian","Kittling"];
 
    
    for(let y = 0; y<4; y++){
        var canvas = document.getElementById("myCanvas"+`${petnames[y]}`);
        const ctx = canvas.getContext("2d");      
        for(let i=0; i<9;i++){

        const images = document.getElementsByClassName("img"+`${petnames[y]}`);
       ctx.drawImage(images[i],0,0);
        //console.log(images[i]);
            }//end of i
            
        //console.log(petnames[y]);

    }//end of y
   
    
    
}

