$(".nuevaFotoUsuario").change(function(){
    var imagen = this.files[0];

    if(imagen["type"] != "image/jpge" && imagen["type"] != "image/jpg" &&  imagen["type"] != "image/png" ){
        $(".nuevaFotoUsuario").val("");

        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Formato de archivo no válido',
            })
    }else if(imagen["size"] > 2000000){
        $(".nuevaFotoUsuario").val("");

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
            $(".vistaPreviaUsuario").attr("src",rutaImagen);
        })

       
    }
});