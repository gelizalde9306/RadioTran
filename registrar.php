<?php
      require_once "controllers/usuariosControlador.php";
      require_once "models/usuariosModel.php";
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Incidencias La Comer</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/adminlte.css">

  <link rel="stylesheet" href="views/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- DataTables -->
  <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="views/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="views/dist/js/adminlte.min.js"></script>

<script src="views/plugins/datatables/jquery.dataTables.js"></script>
<script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script src="views/plugins/sweetalert2/sweetalert2.min.js"></script>



</head>
<body class="hold-transition sidebar-mini" style="background: linear-gradient(rgba(0,0,0,1), rgb(0,30,50,1)););">
<!--<div class="wrapper centrar">-->

 
<div class="login-box centrar">
  <div class="login-logo">
    <br>
    <a href="#"><b style="color:white;"> Registrar Nuevo Usuario</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="width:400px;">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingrese los datos solicitados</p>

      <form role="form" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Correo electrónico" name="nuevoCorreo" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="nuevoContrasenia" required> 
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="form-group">              
                <div class="panel">SUBIR FOTO</div>
                <input type="file" class="nuevaFotoUsuario" name="nuevaFotoUsuario" required>
                    <p class="help-block">Peso máximo de la foto 2 MB</p>
                <img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail vistaPreviaUsuario" width="100px">
             </div>
        </div>
        <div class="container"> 
            <div class="row">
                
                <div class="col-6">
                    <div class="container"> 
                        <div class="icheck-primary">
                            <a href="registrar.php">Regresar</a>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <div class="container"> 
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                </div>
                <!-- /.col -->
                </div>
         </div>

          <?php
             
             $log = new  usuarioController();
             $log -> guardaUsuarioNormal();
         
          ?>
        <br/><br/>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
  
<script src="views/js/nuevosUsuarios.js"></script>


</body>
</html>
