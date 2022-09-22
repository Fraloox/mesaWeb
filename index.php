<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>     

    <!-- Bootstrap 5 CSS-->
    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet"/> 

    <!-- CSS -->
    <link href="css/style.css" rel="stylesheet">
    
    <!-- svg --> 
  

  </head>

  <body>
    
    <div class="container w-75 bg-primary mt-5 mb-5 rounded shadow">
        <div class="row align-items-stretch">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
              
            </div>
            <div class="col bg-white p-5 rounded-end">
                <div class="text-center" >
                    <img src="imagenes/Logo CPC solo.png" width="100" alt="">
                </div>

                <h2 class="fw-bold text-center py-5">Bienvenido</h2>

                <!-- LOGIN -->

                <form action="php-login/validar.php" method="post" class="needs-validation mb-4">

                  <div class="mb-4"> <!-- ESTE ES EL IMPUT DNI -->
                    <label for="dni" class="form-label">DNI</label>

                    <input type="text" 
                      class="form-control"
                      name="dni" 
                      id="dni" 
                      pattern="[0-9]+" 
                      maxlength="8" minlenght="8"
                      required>

                    <div class= "invalid-feedback">
                      Complete el campo
                    </div>
                  </div>

                  <div class="mb-4"> <!-- ESTE ES EL IMPUT CONTRASEÑA -->                  
                    <label for="password" class="form-label">Contraseña</label>

                    <input type="password"
                    class="form-control" 
                    name="contrasena" 
                    id="contrasena"
                    maxlength="20" minlenght="5"
                    required>

                    <div class= "invalid-feedback">
                      Complete el campo
                    </div>
                  </div>
                  <!-- <div class="mb-4 form-check">
                    <input type="checkbox" name="connected" class="form-check-input" id="">
                    <label for="connected" class="form-check-label">Mantenerme conectado</label>
                  </div> -->
                  

                  <!-- <div class="alert alert-danger text-center" >
                      La contraseña es incorrecta
                  </div> -->
                  <div id="error-alert"> <!-- Esta es la alerta de error -->
                    La contraseña es incorrecta
                  </div>

                  <div class="d-grid" > <!-- Botón de iniciar sesion -->
                    <button type="submit" 
                    class="btn btn-primary" 
                    id="btn-iniciarSesion">
                      Iniciar Sesión
                    </button>
                  </div> 

                  <!--<div class="my-3">
                     <span>No tienes cuenta? <a href="#">Regstrate</a></span> <br>
                    <span><a href="#">Recuperar Password</a></span> 
                  </div> -->                 

                </form>               

                <!-- LOGIN CON REDES SOCIALES -->
                <!-- <div class="container w-100 my-5">
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
-->
            </div>
        </div>
    </div>    

    <!-- Scripts-->
    <script src="libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="funciones/funciones-login.js"> </script>
    
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>  
  
  
  </body>

    
</html>