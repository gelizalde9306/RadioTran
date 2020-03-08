$(".nuevaFoto").change(function(){
    var imagen = this.files[0];

    if(imagen["type"] != "image/jpge" && imagen["type"] != "image/jpg" &&  imagen["type"] != "image/png" ){
        $(".nuevaFoto").val("");

        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Formato de archivo no válido',
            })
    }else if(imagen["size"] > 2000000){
        $(".nuevaFoto").val("");

        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Tamaño superio a 2MB!',
        });
    }else{
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load",function(event){
            var rutaImagen = event.target.result;
            $(".vistaPrevia").attr("src",rutaImagen);
        })

       
    }
});

/*=============================================
EDITAR USUARIO
=============================================*/
$(document).on("click", ".btnEditarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");
	
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarApellidoPaterno").val(respuesta["apellidoPaterno"]);
            $("#editarApellidoMaterno").val(respuesta["apellidoMaterno"]);
            $("#editarTelefono").val(respuesta["telefono"]);
            $("#editarEmail").val(respuesta["correo"]);
            $("#fotoActual").val(respuesta["foto"]);
            if(respuesta["foto"] != ""){

				$(".vistaPrevia").attr("src", respuesta["foto"]);

			}
			            
            console.log(respuesta);

		}

	});

});

/*=============================================
ACTIVAR USUARIO
=============================================*/
$(document).on("click", ".btnActivar", function(){

	var idUsuario = $(this).attr("idUsuario");
	var estatus = $(this).attr("estatus");

	var datos = new FormData();
 	datos.append("activarId", idUsuario);
  	datos.append("activarUsuario", estatus);

  	$.ajax({

	  url:"ajax/usuarios.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

        Swal.fire(
            'OK!',
            'Se actualizo correctamente el usuario!',
            'success'
        ).then((result) => {
            if(result.value){
            
                window.location = 'listarUsuarios';
            }
        });
      }

  	})

  	if(estatus == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoUsuario',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoUsuario',0);

  	}

})


/*=============================================
ELIMINAR USUARIO
=============================================*/
$(document).on("click", ".btnEliminarUsuario", function(){

    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
  
    Swal.fire({
        title: '¿Está seguro de borrar el usuario?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario!'
      }).then((result) => {
        if (result.value) {
            window.location = "index.php?ruta=listarUsuarios&idUsuarioElimina="+idUsuario+"&fotoUsuario="+fotoUsuario;
        }
      });

  
  })
  
