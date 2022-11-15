$(document).ready(function () {
  
  if ($("#tabla")) {
    $.ajax({
      type: "GET",
      url: "../../backend/mostrar_tarea.php",

      success: function (data) {
        $("#tabla").html(data);
        
        $(".agregarTarea").on("click", function (e) {
         var datos =  $('#myfor').serialize();
              $.ajax({
                type: "POST",
                data: datos,
                url: "../../backend/alta_tarea.php",
                
                success: function (data) {
                  alert(data)
                  location.reload();
                },
                error: function (request, status, error) {
                  alert(request.responseText);
                },
              });
        });


        $(".delete").on("click", function (e) {
          e.preventDefault();

          var pregunta = confirm("Esta seguro que desea eliminarlo!");
          if (pregunta == true) {
            let tarea_id = $(this).attr("tarea_id");
            $.ajax({
              type: "POST",
              data: "tarea_id=" + tarea_id,
              url: "../../backend/eliminar_tarea.php",

              success: function (data) {
                alert(data);
                location.reload();
              },
              error: function (request, status, error) {
                alert(request.responseText);
              },
            });
          }
        });
      },
      error: function (request, status, error) {
        alert(request.responseText);
      },
    });
  }
});
