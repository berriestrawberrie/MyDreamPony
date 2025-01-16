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
    $('#pony-form').submit(function(e) {
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


    $('#rand-form').submit(function(e) {
        e.preventDefault();
        
        var url = $(this).attr("action");
        let formData = new FormData(this);

        $.ajax({
            type:'GET',
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
        
        var ink = document.getElementById("ink");
        var base = document.getElementById("base");
        var hair = document.getElementById("hair");
        var hairtrait = document.getElementById("hairtrait");
        var white = document.getElementById("white");
        var shade = document.getElementById("shade");
        var mask = document.getElementById("mask");
        var accent = document.getElementById("accent");
        var facetrait = document.getElementById("facetrait");
        var accent2 = document.getElementById("accent2");
        var eye = document.getElementById("eye");
        var now = new Date();

        //CONCATENATE EACH IMAGE WITH A DATE TO REFRESH THE IMAGE AUTOMATICALLY ON GENBUTTONCLICK
        ink.src = ink.src.replace(/\?.*/, function () {
        return '?'+ now.getTime()});

        base.src = base.src.replace(/\?.*/, function () {
            return '?'+ now.getTime()});

        hair.src = hair.src.replace(/\?.*/, function () {
                return '?'+ now.getTime()});

        hairtrait.src = hairtrait.src.replace(/\?.*/, function () {
            return '?'+ now.getTime()});
            
        white.src = white.src.replace(/\?.*/, function () {
                    return '?'+ now.getTime()});

        shade.src =shade.src.replace(/\?.*/, function () {
        return '?'+ now.getTime()});

        mask.src =mask.src.replace(/\?.*/, function () {
            return '?'+ now.getTime()});
        
        accent.src = accent.src.replace(/\?.*/, function () {
                return '?'+ now.getTime()});
        
        facetrait.src = facetrait.src.replace(/\?.*/, function () {
                return '?'+ now.getTime()});
        
        accent2.src = accent2.src.replace(/\?.*/, function () {
                    return '?'+ now.getTime()});

        eye.src = eye.src.replace(/\?.*/, function () {
                    return '?'+ now.getTime()});
    }//END OF REFRESH DIV



    
    
    