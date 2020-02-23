<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Transmisiones
    
    </h1>


  </section>

  <section class="content">

    <div class="box">

      
      <div class="box-body">
        
       <table class="table table-bordered table-striped table-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Descripcion</th>
           <th>URL</th>
           <th>Horario</th>
           <th>Estado</th>
           <th>Fecha Creación</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
        <?php
           $listado = estacionController::mostrarTransmisionesPorUsuario();
           $max = sizeof($listado);
           if($max > 0){
                foreach($listado as $key => $value){

                    echo '<tr>
                    <td>'.$value["id_transmision"].'</td>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["descripcion"].'</td>
                    <td>'.$value["url"].'</td>
                    <td>'.$value["horario"].'</td>
                    <td><p class="btn btn-success btn-xs">Activado</p></td>
                    <td>'.$value["fecha_creacion"].'</td>
                    <td>
        
                      <div class="btn-group">
                          
                         <button class="btn btn-danger btnEliminarTransmision" idTransmision="'.$value["id_transmision"].'"><i class="fa fa-times"></i></button>
        
                      </div>  
        
                    </td>
        
                  </tr>
                    ';

                }
          }else{
            echo 'Aun no se han registrado Transmisiones';
          }

        ?>
         

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>


<?php   
    $transmision =  new estacionController();
    $transmision -> borrarTransmision();
?>
