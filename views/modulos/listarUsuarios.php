<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar usuarios
    
    </h1>

    <!-- <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar usuarios</li>
    
    </ol> -->

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
        
        <button class="btn btn-primary" data-toggle="modal" data-target="#ModalExample">
          
          Agregar usuario administrador

        </button>
        
      </div>
      <br><br>
      <div class="box-body">
        
       <table class="table table-bordered table-striped table-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Apellido Paterno</th>
           <th>Apellido Materno</th>
           <th>Correo</th>
           <th>Estatus</th>
           <th>Foto</th>
           <th>FechaRegistro</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          <?php
                $itemA = null;
                $valorA = null;
                $respuestaUsuarios = usuarioController::mostrarUsuarios($itemA, $valorA);

             //  var_dump($respuestaUsuarios);

               foreach($respuestaUsuarios as $key => $value){
                  echo '<tr>
                        <td>'.$value["id_usuario"].'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["apellidoPaterno"].'</td>
                        <td>'.$value["apellidoMaterno"].'</td>
                        <td>'.$value["correo"].'</td>';

                        if($value["estatus"] == '1'){
                            echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id_usuario"].'" estatus="0">Activado</button></td>';
                        }else{
                             echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id_usuario"].'" estatus="1">Desactivado</button></td>';
                        }

                        if($value["foto"] == "" ){
                            echo '<td><img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                            
                        }else{
                          echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
                        }

                        echo '<td>'.$value["fechaCreacion"].'</td>
                              <td>
                                <div class="btn-group">
                                <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id_usuario"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id_usuario"].'" fotoUsuario="'.$value["foto"].'" correo="'.$value["correo"].'"><i class="fa fa-times"></i></button>

                                </div>  
                              </td>
                       </tr>';
                  
               }
          ?>

          <!-- <tr>
            <td>1</td>
            <td>Usuario Administrador</td>
            <td>admin</td>
            <td><img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
            <td>Administrador</td>
            <td><button class="btn btn-success btn-xs">Activado</button></td>
            <td>2017-12-11 12:05:32</td>
            <td>

              <div class="btn-group">
                  
                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

              </div>  

            </td>

          </tr>

           <tr>
            <td>1</td>
            <td>Usuario Administrador</td>
            <td>admin</td>
            <td><img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
            <td>Administrador</td>
            <td><button class="btn btn-success btn-xs">Activado</button></td>
            <td>2017-12-11 12:05:32</td>
            <td>

              <div class="btn-group">
                  
                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

              </div>  

            </td>

          </tr>

           <tr>
            <td>1</td>
            <td>Usuario Administrador</td>
            <td>admin</td>
            <td><img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
            <td>Administrador</td>
            <td><button class="btn btn-danger btn-xs">Desactivado</button></td>
            <td>2017-12-11 12:05:32</td>
            <td>

              <div class="btn-group">
                  
                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

              </div>  

            </td>

          </tr> -->

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<!-- Modal HTML Markup -->
<div id="ModalExample" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-xs-center " style="text-align:center;">Registrar Administrador</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
             </div>
            <div class="modal-body">
                <form role="form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="nombre" value="" placeholde="Ingrese su nombre" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Apellido Paterno</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="apellidoPaterno" value="" placeholde="Ingrese su apellido paterno" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Apellido Materno</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="apellidoMaterno" value="" placeholde="Ingrese su apellido materno" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Telefono</label>
                        <div>
                            <input type="tel" class="form-control input-lg" name="telefono" value="" placeholde="Ingrese su telefono" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3]" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Correo</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Contraseña</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password">
                        </div>
                    </div>

                    <div class="form-group">              
                        <div class="panel">SUBIR FOTO</div>
                            <input type="file" class="nuevaFoto" name="nuevaFoto" required>
                           <p class="help-block">Peso máximo de la foto 2 MB</p>
                           <img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail vistaPrevia" width="100px">
                         </div>
                      </div>
                  <div class="container">  
                      <div class="form-group">
                          <div style="float:right;">
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                          </div>
                      </div>
                    </div>
                    <br>
                      
                    <?php   
                        $editarUsuario =  new usuarioController();
                        $editarUsuario -> crearUsuarioAdmin();
                    ?>
                    

                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="modalEditarUsuario" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-xs-center " style="text-align:center;">Editar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
             </div>
            <div class="modal-body">
                <form role="form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" value=""  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Apellido Paterno</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="editarApellidoPaterno" id="editarApellidoPaterno" value="" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Apellido Materno</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="editarApellidoMaterno" id="editarApellidoMaterno" value="" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Telefono</label>
                        <div>
                            <input type="tel" class="form-control input-lg" name="editarTelefono" id="editarTelefono"value="" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Correo</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail"value="">
                        </div>
                    </div>
                   

                    <div class="form-group">              
                        <div class="panel">SUBIR FOTO</div>
                        <input type="file" class="nuevaFoto" name="editarFoto">
                           <p class="help-block">Peso máximo de la foto 2 MB</p>
                           <img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail vistaPrevia" width="100px">
                           <input type="hidden" name="fotoActual" id="fotoActual">
                         </div>
                      </div>
                  <div class="container">  
                      <div class="form-group">
                          <div style="float:right;">
                            <button type="submit" class="btn btn-success">Guardar Cambios</button>
                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                          </div>
                      </div>
                    </div>
                    <br>
                      
                    <?php   
                        $editarUsuario =  new usuarioController();
                        $editarUsuario -> editarUsuario();
                    ?>
                    

                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php   
    $editarUsuario =  new usuarioController();
    $editarUsuario -> borrarUsuario();
?>