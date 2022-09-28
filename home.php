<?php
  include_once "conexion.php";
  $sentencia = $bd -> query ("SELECT * FROM usuarios");
  $persona = $sentencia ->fetchAll(PDO::FETCH_OBJ);
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  <!-- Bootstrap 5 CSS-->
  <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet" />

  <!--My CSS-->
  <link href="css/style-Home.css" rel="stylesheet" />

</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

    <div class="container-fluid">

      <!--offcanvas trigger-->
      <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
      </button>
      <!--offcanvas trigger-->

      <a class="navbar-brand fw-bold text-uppercase me-auto" href="#">C.P.C.®</a>

      <ul class="navbar-nav ">

        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="bi bi-person-fill"></i>
          </a>

          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

            <li><a class="dropdown-item" href="#">Información</a></li>            

            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>            
              <a class="dropdown-item text-danger" href="#">Salir</a>            
            </li>
          </ul>

        </li>

      </ul>

    </div>

  </nav>
  <!-- NAVBAR -->

  <!-- OFFCANVAS -->
  <div class="offcanvas bg-dark text-white sidebar-nav" 
  tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

    <div class="offcanvas-body p-0">
        <nav class="avbar-dark">
          <ul class="navbar-nav">

            <li>
              <div class="text-muted small fw-bold text-uppercase px-3">VISUALIZACIÓN</div>
            </li>

            <li>

              <a class="nav-link px-3 sidebar-link" 
              data-bs-toggle="collapse" href="#collapseExample" 
              role="button" aria-expanded="false" aria-controls="collapseExample">

                <span class="me-2">
                  <i class="bi bi-person-rolodex"></i>
                </span>

                <span>
                  Personal
                </span>

                <span class="right-icon ms-auto">
                  <i class="bi bi-chevron-down"></i>
                </span>

              </a>

              <div class="collapse" id="collapseExample">

                <div>

                  <ul class="navbar-nav ps-3">

                    <li>

                      <a href="#" class="nav-link px-3">
                        <span class="me-2">
                          <i class="bi bi-file-earmark-person"></i>
                        </span>
                        <span>
                          Empleados
                        </span>
                      </a>

                    </li>
                    
                    <li>

                      <a href="#" class="nav-link px-3">
                        <span class="me-2">
                          <i class="bi bi-person-circle"></i>
                        </span>
                        <span>
                          Administradores
                        </span>
                      </a>

                    </li>

                  </ul>

                </div>

              </div>

              <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <span class="me-2">
                  <i class="bi bi-box-seam"></i>
                </span>
                <span>
                  Productos
                </span>                
              </a>

            </li>

            <li class="my-4">
              <hr class="dropdown-divider" />     
            </li>      

          </ul>
        </nav>    
    </div>
  </div>
  <!-- OFFCANVAS -->

  <!-- CRUD -->
  <main class="mt-5 pt-3">

    <div class="conteiner mt-5">

      <div class="row justify-content-center">

      <!-- TABLA -->

          <div class="col-md-7">

            <div class="card">

                <div class="card-header">                  
                  Lista de personas
                </div>

                <div class="p-4">

                  <div class="table-responsive align-middle">
                    <table class="table table-primary">
                      <thead>
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Apellido</th>
                          <th scope="col">DNI</th>
                          <th scope="col">Opciones<th>
                        </tr>
                      </thead>

                      <tbody>

                        <?php
                          foreach ($persona as $dato) {

                        ?>

                        <tr>
                          <td scope="row"><?php echo $dato->nombre; ?></td>
                          <td><?php echo $dato->apellido; ?></td>
                          <td><?php echo $dato->dni; ?></td>
                          <td><i class="bi bi-pencil-square"></i></td>
                          <td><i class="bi bi-trash"></i></td>                          
                        </tr>
                        
                        <?php

                          }

                        ?>

                      </tbody>
                    </table>
                  </div>
                  

                </div>

            </div>

          </div>

    <!-- TABLA -->

    <!-- FORMULARIO -->

          <div class="col-md-4">

            <div class="card">

              <div class="card-header">
                  Ingresar datos:
              </div>

              <form class="p-4" action="registrar.php" method="POST">

                <div class="mb-3">
                  <label class="form-label">Nombre: </label>
                  <input type="text" class="form-control" name="txtNombre" autofocus>
                </div>

                <div class="mb-3">
                  <label class="form-label">Apellido: </label>
                  <input type="text" class="form-control" name="txtApellido" autofocus>
                </div>

                <div class="mb-3">
                  <label class="form-label">Teléfono: </label>
                  <input type="text" class="form-control" name="txtTel" autofocus>
                </div>

                <div class="d-grid">
                  <input type="hidden" name="oculto" value="1">
                  <input type="submit" class="btn btn-primary" value="Registrar">
                </div>

              </form>              

            </div>

          </div>

          <!-- FORMULARIO -->

      </div>

    </div>

  </main>
  <!-- CRUD -->



  <!-- Scripts-->
  <script src="libs/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
</body>

</html>