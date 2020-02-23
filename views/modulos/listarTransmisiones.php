<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Modificar Estaciones</h1>
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
      <?php
           $respuestaTrans = estacionController::mostrarEstaciones();
           foreach($respuestaTrans as $key => $value){
            echo'  <div class="col-lg-12">
            <div class="card card-primary ">
              <div class="card-header">
                <p class="card-title">
                    <i class="fa fa-music"></i> '. $value["nombre"].'<span class="badge badge-pill badge-primary pull-right"> Fecha de transmision: '.$value["horario"].'</span>
                </p>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p>'.$value["descripcion"].'

                </p>
                <a href="'.$value["url"].'" class="card-link">Ver</a
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>  ';
            
            
           }

           ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  </div>
  <!-- /.content-wrapper -->