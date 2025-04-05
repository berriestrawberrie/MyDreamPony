const dam ={
    white: ["eyeCol1","baseCol1","hairCol1","hairCol211","accentCol1","accentCol211"],
    gold: ["eyeCol2","baseCol2","hairCol2","hairCol212","accentCol2","accentCol212"],
    darkgold: ["eyeCol3","baseCol3","hairCol3","hairCol213","accentCol3","accentCol213"],
    cyan: ["eyeCol6","baseCol6","hairCol6","hairCol216","accentCol6","accentCol216"],
    darkcyan: ["eyeCol7","baseCol7","hairCol7","hairCol217","accentCol7","accentCol217"],
    purple: ["eyeCol4","baseCol4","hairCol4","hairCol214","accentCol4","accentCol214"],
    darkpurple: ["eyeCol5","baseCol5","hairCol5","hairCol215","accentCol5","accentCol215"],
    none: "I'm blank"
}

const sire ={
    black: ["eyeCol21","baseCol21","hairCol21","hairCol221","accentCol21","accentCol221"],
    red: ["eyeCol22","baseCol22","hairCol22","hairCol222","accentCol22","accentCol222"],
    darkred: ["eyeCol23","baseCol23","hairCol23","hairCol223","accentCol23","accentCol223"],
    green: ["eyeCol26","baseCol26","hairCol26","hairCol226","accentCol26","accentCol226"],
    darkgreen: ["eyeCol27","baseCol27","hairCol27","hairCol227","accentCol27","accentCol227"],
    blue: ["eyeCol24","baseCol24","hairCol24","hairCol224","accentCol24","accentCol224"],
    darkblue: ["eyeCol25","baseCol25","hairCol25","hairCol225","accentCol25","accentCol225"],

}

function checked(hex){

        document.getElementById(hex).checked = true;


}//END OF HEX FUNCTION

function damColors(){

    //GET THE  SELECTED COLOR
    let input = document.getElementById("alldamcolors").value;
    let select = dam[input];
    //APPLY THE CHECKED ATTRIBUTE TO ALL COLORS SELECTED
    select.forEach(checked);

}//END OF DAM COLORS

function sireColors(){

    //GET THE  SELECTED COLOR
    let input = document.getElementById("allsirecolors").value;
    let select = sire[input];
    //APPLY THE CHECKED ATTRIBUTE TO ALL COLORS SELECTED
    select.forEach(checked);

}//END OF DAM COLORS