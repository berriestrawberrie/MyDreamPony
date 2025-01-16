/*------------------------------------------
    --------------------------------------------
    Form Submit Event
    --------------------------------------------
    --------------------------------------------*/

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


        // PREVENT FORM FROM REFRESHING THE PAGE BUT SUBMIT DATA TO GEN COLORS
    $('#ponyform2').submit(function(e) {
        e.preventDefault();
         

        //SUBMIT THE FORM TO GENCOLORS WHICH THEN UPDATES THE STORED IMAGES. 
        var url = $(this).attr("action");
        let formData = new FormData(this);
    
        $.ajax({
                type:'POST',
                url: url,
                data: formData,
                contentType: false,
                processData: false,
           });

           //NOW REFRESH THE IMAGE WITHOUT REFRESHING THE ENTIRE PAGE
           refreshDiv ();
    });

    
   //REFRESH THE IMAGE WITHOUT REFRESHING THE PAGE
    function refreshDiv (){
        
        var image= document.getElementById("image");

        var now = new Date();

        //CONCATENATE EACH IMAGE WITH A DATE TO REFRESH THE IMAGE AUTOMATICALLY ON GENBUTTONCLICK
        image.src = image.src.replace(/\?.*/, function () {
        return '?'+ now.getTime()});

    }
    //END OF REFRESH DIV
 



//FEMALE COLOR CHANGES
    function changeEye2(colorParam){
        let color = colorParam.value;
        var optionElement = document.getElementById("eyeCol2div");
        optionElement.style.background = color;
    }
    function changeHair2(colorParam){
        let color = colorParam.value;
        var optionElement = document.getElementById("hairCol2div");
        optionElement.style.background = color;
    }

    function changeHair22(colorParam){
        let color = colorParam.value;
        var optionElement = document.getElementById("hairCol22div");
        optionElement.style.background = color;
    }

    function changeAccent2(colorParam){
        let color = colorParam.value;
        var optionElement = document.getElementById("accentCol2div");
        optionElement.style.background = color;
    }

    function changeAccent22(colorParam){
        let color = colorParam.value;
        var optionElement = document.getElementById("accentCol22div");
        optionElement.style.background = color;
    }

    function changeBase2(colorParam){
        let color = colorParam.value;
        var optionElement = document.getElementById("baseCol2div");
        optionElement.style.background = color;
    }
    

//MALE COLOR CHANGES
function changeEye(colorParam){
    let color = colorParam.value;
    var optionElement = document.getElementById("eyeColdiv");
    optionElement.style.background = color;
}
function changeHair(colorParam){
    let color = colorParam.value;
    var optionElement = document.getElementById("hairColdiv");
    optionElement.style.background = color;
}

function changeHair21(colorParam){
    let color = colorParam.value;
    var optionElement = document.getElementById("hairCol21div");
    optionElement.style.background = color;
}

function changeAccent(colorParam){
    let color = colorParam.value;
    var optionElement = document.getElementById("accentColdiv");
    optionElement.style.background = color;
}

function changeAccent21(colorParam){
    let color = colorParam.value;
    var optionElement = document.getElementById("accentCol21div");
    optionElement.style.background = color;
}

function changeBase(colorParam){
    let color = colorParam.value;
    var optionElement = document.getElementById("baseColdiv");
    optionElement.style.background = color;
}

