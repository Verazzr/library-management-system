    $(function() {

    $( "#dialog_1,#dialog_2,#dialog_4" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 500
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
    $( "#btn_1" ).click(function() {
      $( "#dialog_1" ).dialog( "open" );
    });
    $( "#btn_2" ).click(function() {
      $( "#dialog_2" ).dialog( "open" );
    });
    $( "#btn_4" ).click(function() {
      $( "#dialog_4" ).dialog( "open" );
    });
  });