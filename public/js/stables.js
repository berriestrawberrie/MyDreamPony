$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$( function() {
  //MAKE THE UL ON THIS PAGE SORTABLE
    $( "ul" ).sortable({
      //WHEN THERE IS AN UPDATE ON THE PAGE TRIGGER SAVE
      update: function(event,ui){
        //GRAB THE INDEX OF THE CURRENT CONFIGURATION
        $(this).children().each(function(index){
          //IF DATABASE POSITION DIFF THAN SORTED POSITION UPDATE ON PAGE
          if($(this).attr('data-position') != (index+1)){
            $(this).attr('data-position', (index+1)).addClass('updated');
          }//END OF IF
        });
       saveNewPositions();
        
      } //END OF UPDATE
    });

  } );//END OF SORT FUNCTION


  function saveNewPositions(){
    var positions = [];
    $('.updated').each(function(){
        positions.push([$(this).attr('data-index'),$(this).attr('data-position')]);
        $(this).removeClass('updated');
    });


    console.log(positions);

    $.ajax({
      url: '/newstable',
      type: 'POST',
      data: {
      order: positions},
  });
  
  
}//END OF SAVEPOSITIONS FUNCTION



