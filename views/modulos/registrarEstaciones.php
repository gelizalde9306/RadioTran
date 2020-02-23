<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Registrar Transmisión</h1>
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
                      <label for="nombreTrans">Nombre de la transmisión</label>
                      <input type="text" class="form-control" id="nombreTrans" name="nombreTrans" placeholder="Ingrese un nombre" required>
                    </div>
                    <div class="col-md-6 mb-6">
                      
                        <label class="control-label" for="fechaTransmision">Horario de transmisión</label>
                        <input type="text" class="form-control float-right" id="fechaTransmision" name="fechaTransmision" required>
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-12 mb-12">
                      <label for="descripcion">Descripción</label>
                      <textarea class="form-control" id="descripcion" rows="3" name="descripcion" required></textarea>
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-12 mb-12">
                      <label for="nombreTrans">URL</label>
                      <input type="text" class="form-control" id="urlTrans" name="urlTrans" placeholder="Ingrese la URL" required>
                    </div>
                  </div>
                  <br>
                  <button class="btn btn-primary" type="submit">Guardar</button>


                  <?php   
                        $estacion =  new estacionController();
                        $estacion -> registrarTransmision();
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