<?php

    class estacionController{

        static public function registrarTransmision(){
            if(isset($_POST["nombreTrans"])){
                
                $tabla = 'transmisiones';
                $fecha = date('Y-m-d');
		        $hora = date('H:i:S');
                $fechaCompleta = $fecha.' '.$hora;
                
                $old_date = explode(' ', $_POST["fechaTransmision"]); 
               
                $AuxFecha =  $old_date[0];
                $AuxHora =  $old_date[1];
                
                $armaHora = explode('-', $AuxFecha); 
                $ft = $armaHora[2].'-'.$armaHora[1].'-'.$armaHora[0].' '.$hora;
              
               
                $datos = array(
                    "idUsuario" => $_SESSION["id"],
                    "nombre" => $_POST["nombreTrans"],
                    "horario" => $ft,
                    "descripcion" => $_POST["descripcion"],
                    "url" => $_POST["urlTrans"],
                    "fechaCreacion" => $fechaCompleta,
                    "estatus" => "1"
                );

                $respuesta = ModeloTransmisiones::registrarTransmision($tabla, $datos);

                if($respuesta == 'ok'){

                    echo "<script>

                    Swal.fire(
                        'OK!',
                        'Se registro correctamente el la estacion de radio!',
                        'success'
                    ).then((result) => {
                        if(result.value){
                        
                            window.location = 'inicio';
                        }
                    });

                    </script>";

                 }else{
                    echo "<script>
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Ocurrio un error al crear el usuario!',
                    }).then((result) => {
                        if(result.value){
                            window.location = 'inicio';
                        }
                    });
                
                    </script>";

                }

            }
        }    


        static public function  mostrarEstaciones(){
            $tabla = 'transmisiones';
            $respuesta = ModeloTransmisiones::mostrarTransmisiones($tabla);
            return $respuesta;
        }

        static public function  mostrarTransmisionesPorUsuario(){
            $tabla = 'transmisiones';
            $valor = $_SESSION["id"];
            $item = 'id_usuario';
            $respuesta = ModeloTransmisiones::mostrarTransmisiones($tabla,$item,$valor);
            return $respuesta;
        }

        static public function borrarTransmision(){

            if(isset($_GET["idTransmision"])){

                $tabla = 'transmisiones';
                $id = $_GET["idTransmision"];

                $respuesta = ModeloTransmisiones::borrarTransmision($tabla,$id);

                if ($respuesta =='ok'){
                    echo "<script>

                    Swal.fire(
                        'OK!',
                        'Se elimino correctamente la transmisión',
                        'success'
                    ).then((result) => {
                        if(result.value){
                        
                            window.location = 'inicio';
                        }
                    });

                    </script>";
                }else{
                    echo "<script>
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Ocurrio un error al eliminar el usuario',
                    }).then((result) => {
                        if(result.value){
                            window.location = 'inicio';
                        }
                    });
                
                    </script>";
                }
            }

        }

    }
?>