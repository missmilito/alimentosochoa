$(document).on('ready',function(){
    $('#btn-ingresar').click(function(){
        var url = "herramientas/includes/phpproductos.php";
        $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario").serialize(),
           success: function(data)
           {
             $('#piechart_3d').html(data);
           }
       });
    });
});
