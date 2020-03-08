<?php
  session_start();
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
 <!-- daterange picker -->
 <link rel="stylesheet" href="views/plugins/daterangepicker/daterangepicker.css">

<script src="views/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Bootstrap Date-Picker Plugin -->
<!-- date-range-picker -->
<script src="views/plugins/moment/moment.min.js"></script>
<script src="views/plugins/daterangepicker/daterangepicker.js"></script>

<!-- ChartJS -->
<script src="views/plugins/chart.js/Chart.min.js"></script>


<body class="hold-transition sidebar-mini" style="background: linear-gradient(rgba(0,0,0,1), rgb(0,30,50,1)););">
<!--<div class="wrapper centrar">-->

  <?php
     
     if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok" ){
      echo '<div class="wrapper ">';

      include "modulos/cabezote.php";

      include "modulos/menuVertical.php";

      if(isset($_GET["ruta"])){
          if( $_GET["ruta"] == "inicio" ||
              $_GET["ruta"] == "registrarEstaciones" ||
              $_GET["ruta"] == "listarUsuarios"   ||
              $_GET["ruta"] == "modificarTransmisiones"   ||
              $_GET["ruta"] == "modificarUsuarios" ||
              $_GET["ruta"] == "salir"||
              $_GET["ruta"] == "listarTransmisiones" ||
              $_GET["ruta"] == "registroIncidencia"  ||
              $_GET["ruta"] == "estadisticasIncidencias"
              ){
                include "modulos/".$_GET["ruta"].".php"; 
          }else{
               
                
                include "modulos/404.php";
        }
      }else{
        include "modulos/inicio.php";
      }
        
      
     
      include "modulos/footer.php";

      echo '</div>';
    }else{
      include "modulos/login.php";

    }
  ?>


<script src="views/js/usuarios.js"></script>

<script src="views/js/plantilla.js"></script>

<script src="views/js/transmision.js"></script>

<script src="views/js/estadisticas.js"></script>


</body>
</html>
