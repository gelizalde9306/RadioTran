<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Registrar Incidencia</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
      

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">

              <div class="card-body">
                
                <form role="form" method="post">

                  <div class="form-row">
                    <div class="col-md-6 mb-6">
                      <label for="nombreTrans">Seleccione el sistema</label>

                      <select class="form-control" id="idSistema" name="idSistema" required>
                      <?php
                        $itemA = null;
                        $valorA = null;
                        $respuestaUsuarios = incidenciasController::mostrarCatalogoSistemas();

                        var_dump($respuestaUsuarios);

                        foreach($respuestaUsuarios as $key => $value){
                            echo "<option value=".$value["id_sistema"].">".$value["id_sistema"]." - ".$value["descripcion"] ." </option>";
                        }
                      
                      ?>

                      </select>

                      </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-12 mb-12">
                      <label for="descripcion">Descripción</label>
                      <textarea class="form-control" id="descripcion" rows="5" name="descripcion" required></textarea>
                    </div>
                  </div>
                  <br>
                  <button class="btn btn-primary" type="submit">Guardar</button>
                        
                  <?php   
                        $estacion =  new incidenciasController();
                        $estacion -> registrarIncidencia();
                    ?>

                  
                </form>
              </div>
            </div>


          </div>
      
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->