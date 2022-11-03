<?php
  include_once "conexion.php";
  $sentencia = $bd-> query("SELECT * FROM usuarios");
  $personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
  
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
  <main class="mt-5 pt-3 main" >

    <div class="conteiner mt-5">

      <div class="row justify-content-center">        

        <!-- TABLA -->

          <div class="col">

            <div class="card mx-5">

              <!-- ALERTA -->

                <?php

                  if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){

                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Registrado!</strong> Se agregaron los datos.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php

                  }

                ?>

              <!-- ALERTA -->

                <div class="card-header">                  
                  Lista de personas

                  <a href="#"
                  class="btn btn-success"
                  data-bs-toggle="modal" 
                  data-bs-target="#staticBackdrop"
                  onClick="clearDatos();">

                  <i class="bi bi-person-plus-fill"></i>

                  </a>
                </div>

                <div class="p-4">

                  <div class="table-responsive align-middle">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Apellido</th>
                          <th scope="col">DNI</th>
                          <th scope="col">Teléfono</th>
                          <th scope="col">Opciones<th>
                        </tr>
                      </thead>

                      <tbody>

                        <?php
                        
                          foreach ($personas as $dato) { //COMIENZA EL FOREACH

                        ?>                         

                        <tr>
                          <!-- input hidden para datos -->
                          <input type="hidden"
                          id="dato_id"
                          value="<?php echo $dato->id; ?>">

                          <input type="hidden"
                          id="dato_nombre"
                          value="<?php echo $dato->nombre; ?>">

                          <input type="hidden"
                          id="dato_apellido"
                          value="<?php echo $dato->apellido; ?>">

                          <input type="hidden"
                          id="dato_dni"
                          value="<?php echo $dato->dni; ?>">

                          <input type="hidden"
                          id="dato_telefono"
                          value="<?php echo $dato->telefono; ?>">

                          <input type="hidden"
                          id="dato_email"
                          value="<?php echo $dato->email; ?>">

                          <input type="hidden"
                          id="dato_direccion"
                          value="<?php echo $dato->direccion; ?>">

                          <input type="hidden"
                          id="dato_rol"
                          value="<?php echo $dato->rol; ?>">
                          <!-- input hidden para datos -->

                          <td scope="row" ><?php echo $dato->nombre; ?></td>
                          <td><?php echo $dato->apellido; ?></td>
                          <td><?php echo $dato->dni; ?></td>
                          <td><?php echo $dato->telefono; ?> </td>
                        
                          <td>
                            <a type="button" 
                            class="btn btn-primary" 
                            data-bs-toggle="modal" 
                            data-bs-target="#staticBackdrop"
                            onClick="cargarDatos();">

                              <i class="bi bi-pencil-square"></i>

                            </a>                            
                          
                            <a href="#"
                            class="btn btn-danger">

                            <i class="bi bi-trash3-fill"></i>

                            </a>
                            
                        
                          </td>

                        </tr>
                        
                        <?php

                          } //TERMINA EL FOREACH

                        ?>

                      </tbody>
                    </table>
                  </div>
                  

                </div>

            </div>

          </div>

        <!-- TABLA -->

        <!-- MODAL -->

          <div class="modal fade"
          id="staticBackdrop"
          data-bs-backdrop="static"
          data-bs-keyboard="false"
          tabindex="-1"
          aria-labelledby="staticBackdropLabel"
          aria-hidden="true">

            <div class="modal-dialog">

              <div class="modal-content">

                <div class="modal-header">

                  <h5 class="modal-title"
                  id="staticBackdropLabel">
                      Edición de datos
                  </h5>

                  <button type="button" 
                  class="btn-close" 
                  data-bs-dismiss="modal" 
                  aria-label="Close">
                  </button>

                </div>

                  <!-- FORMULARIO -->

                <form action="registrar.php" 
                method="POST">

                  <div class="modal-body">

                    <div class="container">                    

                      <div class="row">

                        <div class="col-md-6">                          

                          <input type="text"
                          class="form-control mb-2"
                          id="txtNombre" 
                          name="txtNombre"
                          placeholder= "Nombre"
                          value=""
                          autofocus
                          maxlength="20" minlenght="3"
                          required>
                        
                        </div>

                        <div class="col-md-6">
                  
                          <input type="text"
                          class="form-control mb-2"
                          id="txtApellido" 
                          name="txtApellido"
                          placeholder= "Apellido"
                          value="" 
                          autofocus
                          maxlength="20" minlenght="3"
                          required>
                        
                        </div>

                      </div>
                      
                      <div class="row">                       

                        <div class="col-md-6">

                          <input type="text"
                            class="form-control mb-2" 
                            id="txtTelefono"
                            name="txtTelefono"
                            placeholder= "Teléfono" 
                            value=""
                            autofocus
                            pattern="[0-9]+" 
                            maxlength="10" minlenght="10"
                            required>

                        </div>

                        <div class="col-md-6">

                          <input type="text"
                            class="form-control mb-2"
                            id="txtDni" 
                            name="txtDni"
                            placeholder= "DNI" 
                            value=""
                            autofocus
                            pattern="[0-9]+" 
                            maxlength="8" minlenght="8"
                            required>

                        </div>                        

                      </div>

                      <div class="row mt-2">

                        <div class="col-md-6">

                          <input type="text"
                            class="form-control mb-2"
                            id="txtEmail" 
                            name="txtEmail"
                            placeholder="Email" 
                            value=""                            
                            autofocus
                            maxlength="30" minlenght="3"
                            required>

                        </div>
                        
                        <div class="col-md-6 input-group w-50 h-100">

                          <input type="password"
                            class="form-control" 
                            name="txtContrasena"
                            placeholder="Contraseña" 
                            id="txtContrasena"
                            maxlength="20" minlenght="5"
                            required>
                          
                            <span class="input-group-text" onclick="vista_form();">
                              <i class="bi bi-eye" id="ver"></i>
                              <i class="bi bi-eye-slash" id="ocultar" style="display:none;"></i>
                            </span>
                                                                          

                        </div>                                            

                      </div>

                      <div class="row mt-2">

                        <div class="col-md-7">

                          <input type="text"
                            class="form-control mb-2" 
                            id="txtDireccion"
                            name="txtDireccion"
                            placeholder="Dirección" 
                            value=""
                            autofocus
                            maxlength="100" minlenght="10"
                            required>

                        </div>

                        <div class="col-md-5">

                          <select class="form-select mb-2" 
                          aria-label="Default select example"
                          id="sctRol"
                          name="sctRol"
                          required>

                            <option value="">Rol</option>
                            <option value="1">Administrador</option>
                            <option value="2">Empleado</option> 

                          </select>

                        </div>

                      </div>

                    </div>

                  </div>

                  <div class="modal-footer">

                    <div class="w-100 h-100" id="error-alert"> <!-- Esta es la alerta de error -->
                      Mensaje de error
                    </div>

                    <button type="button" 
                    class="btn btn-secondary" 
                    data-bs-dismiss="modal">Cerrar</button>

                    <button type="submit" 
                    class="btn btn-primary">Guardar</button>
                  
                  </div>

                </form>

                  <!-- FORMULARIO -->                

              </div>

            </div>
        
          </div>

        <!-- MODAL -->      

      </div>

    </div>

  </main>
  <!-- CRUD -->  

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>

  <!-- Scripts-->
  <script src="libs/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="funciones/funciones-home.js"></script>
</body>

</html>