$('#fechaTransmision').daterangepicker({
    "timePicker": true,
    "autoApply":true,
    "autoUpdateInput":true,
    "singleDatePicker": true,"locale":{"format": "DD-MM-YYYY hh:mm:sss"} 
});


  /*=============================================
ELIMINAR USUARIO
=============================================*/
$(document).on("click", ".btnEliminarTransmision", function(){

    var idTransmision = $(this).attr("idTransmision");
   
    Swal.fire({
        title: '¿Está seguro de borrar el usuario?',
        text: "¡Si no lo está puede cancelar la accíón!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario!'
      }).then((result) => {
        if (result.value) {
            window.location = "index.php?ruta=modificarTransmisiones&idTransmision="+idTransmision;
        }
      });

      

  
  })