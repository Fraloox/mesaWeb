<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>   

    <!-- CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Bootstrap 5 CSS-->
    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    
  </head>
  <body>
    
    <div class="container w-75 bg-primary mt-5 mb-5 rounded shadow">
        <div class="row align-items-stretch">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
              
            </div>
            <div class="col bg-white p-5 rounded-end">
                <div class="text-end" >
                    <img src="imagenes/Logo CPC solo.png" width="78" alt="">
                </div>

                <h2 class="fw-bold text-center py-5">Bienvenido</h2>

                <!-- LOGIN -->

                <form action="validar.php" method="post">
                  <div class="mb-4">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" name="correo">
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="contrasena">
                  </div>
                  <div class="mb-4 form-check">
                    <input type="checkbox" name="connected" class="form-check-input" id="">
                    <label for="connected" class="form-check-label">Mantenerme conectado</label>
                  </div>

                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                  </div>

                  <div class="my-3">
                    <!-- <span>No tienes cuenta? <a href="#">Regstrate</a></span> <br>
                    <span><a href="#">Recuperar Password</a></span> -->
                  </div>

                </form>

                <!-- LOGIN CON REDES SOCIALES -->
                <div class="container w-100 my-5">
                  <div class="row text-center">
                    <div class="col-12">Iniciar Sesión</div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <button class="btn btn-outline-primary w-100 my-1">
                        <div class="row align-items-center">
                          <div class="col-2 d-none d-md-block">
                            <img src="Imagenes/facebook_32.png" width="32" alt="">
                          </div>

                          <div class="col-12 col-md-10 text-center">
                            Facebook
                          </div>
                        </div>
                      </button>
                    </div>
                    <div class="col">
                      <button class="btn btn-outline-danger w-100 my-1">
                        <div class="row align-items-center">
                          <div class="col-2 d-none d-md-block">
                            <img src="Imagenes/google_32.png" width="32" alt="">
                          </div>

                          <div class="col-12 col-md-10 text-center">
                            Google
                          </div>
                        </div>
                      </button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts-->
    <script src="libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    
  </body>
</html>