$( "#respuesta" ).change(function() {

    respuesta = $("#respuesta").val();

    if(respuesta <= 6)
    {
      $("#otraPregunta1Div").attr("hidden",false);
      $("#otraPregunta2Div").attr("hidden",true);
      $("#otraPregunta3Div").attr("hidden",true);
    }
    else if (respuesta <= 8 && respuesta >= 6)
    {
         $("#otraPregunta2Div").attr("hidden",false);
          $("#otraPregunta1Div").attr("hidden",true);
        $("#otraPregunta3Div").attr("hidden",true)
    }
    else
    {
      $("#otraPregunta3Div").attr("hidden",false);
       $("#otraPregunta1Div").attr("hidden",true);
      $("#otraPregunta2Div").attr("hidden",true)
    }


});

$( "#guardar" ).click(function() {

       respuesta = $("#respuesta").val();

    if(respuesta <= 6)
    {
      $("#otraPregunta2Div").remove();
      $("#otraPregunta3Div").remove();
    }
    else if (respuesta <= 8 && respuesta >= 6)
    {
              $("#otraPregunta1Div").remove();
            $("#otraPregunta3Div").remove();
    }
    else
    {
            $("#otraPregunta1Div").remove();
            $("#otraPregunta2Div").remove();
    }
});