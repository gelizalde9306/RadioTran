<div class="login-box centrar">
  <div class="login-logo">
    <br>
    <a href="#"><b style="color:white;"> Iniciar Sesión</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingrese sus credenciales de usuario</p>

      <form  method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Correo electrónico" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="password" required> 
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
                 <a href="registrar.php">Registrarse</a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
          </div>
          <!-- /.col -->
        </div>

          <?php
              $login = new  usuarioController();
              $login -> validaIngresoUsuario();
          ?>

      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->