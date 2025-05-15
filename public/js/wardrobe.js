$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
});

function changeBase(){

    let basehue = "A86344";
    let avatarid = document.getElementById("selectrace").value;
    let extrahue = "FF0000";

    console.log(`
        Base Hue: ${basehue}
        AvatarID: ${avatarid}
        Extra Hue: ${extrahue}`);
    
    document.getElementById("base").src="/buildavatarcolors/"+avatarid+"/base/"+basehue;
    document.getElementById("extra").src="/buildavatarcolors/"+avatarid+"/extra/"+extrahue;
    document.getElementById("mask").src="/buildavatar/"+avatarid+"/mask";
    document.getElementById("shade").src="/buildavatar/"+avatarid+"/shade";
    document.getElementById("ink").src="/buildavatar/"+avatarid+"/ink";
    document.getElementById("white").src="/buildavatar/"+avatarid+"/white";
    

}

