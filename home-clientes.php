<?php

  session_start();

          // *** USER LOGEADO ***

  include_once "conexion.php";

  if(isset($_SESSION['user_id'])){

    $records = $bd->prepare(
      'SELECT id, dni, rol
      FROM usuarios
      WHERE id = :id');    
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);  

    $user = null;

    if(!empty($results)){

      $user = $results;

    }
  }

  if(!$_GET){ //redirecciono a la 1er pagina si no hay un GET, es el "por defecto"
 
    header('Location: home-clientes.php?pagina=1');
    exit();

  } 

          // *** USER LOGEADO *** 


          // *** CONTEO PARA SABER CUANTAS PAGINAS SE NECESITA ***

    $sentencia = $bd->prepare("SELECT * FROM clientes");
    $sentencia->execute();
    $personas = $sentencia->fetchAll(PDO::FETCH_OBJ);

    $total_elementos_db = $sentencia->rowCount();   

    $elemento_x_pagina = 4; // *** CANTIDAD DE ELEMENTOS POR PAGINA PARA LA PAGINACION ***

    $paginas = $total_elementos_db/$elemento_x_pagina;
    $paginas = ceil($paginas);

          // *** CONTEO PARA SABER CUANTAS PAGINAS SE NECESITA ***

    if($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0){

      header('Location: home-clientes.php?pagina=1');
      exit();

    }


          // *** TRAE LA CANTIDAD DE ELEMENTO POR PAGINA ***

    $iniciar = ($_GET['pagina']-1) * $elemento_x_pagina;
    
    $sentencia_element = $bd->prepare("SELECT * FROM clientes LIMIT :iniciar, :nElements");
    $sentencia_element->bindparam(':iniciar', $iniciar, PDO::PARAM_INT);
    $sentencia_element->bindparam(':nElements',$elemento_x_pagina, PDO::PARAM_INT);

    $sentencia_element->execute();

    $result_element = $sentencia_element->fetchAll(PDO::FETCH_OBJ);



          // *** TRAE LA CANTIDAD DE ELEMENTO POR PAGINA ***

    

   

  
  
  include 'template/headerHome.php';
?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

<div class="container-fluid">

  <!--offcanvas trigger-->
  <button class="navbar-toggler " 
  type="button" 
  data-bs-toggle="offcanvas" 
  data-bs-target="#offcanvasExample" 
  aria-controls="offcanvasExample">

    <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>

  </button>
  <!--offcanvas trigger-->

  <a class="navbar-brand fw-bold text-uppercase me-auto" 
  href="home.php"> <!-- Direccion -->

    C.P.C.®

  </a>

  <ul class="navbar-nav ">        

    <li class="nav-item dropdown">

      <a class="nav-link dropdown-toggle" 
      href="#" id="navbarDropdown" 
      role="button" 
      data-bs-toggle="dropdown"
        aria-expanded="false">

        <i class="bi bi-person-fill"></i>

      </a>

      <ul class="dropdown-menu dropdown-menu-end" 
      aria-labelledby="navbarDropdown">

        <li>
          <a class="dropdown-item" 
            href="#">
            Información
          </a>
        </li>            

        <li>
          <hr class="dropdown-divider" />
        </li>

        <li>            
          <a class="dropdown-item text-danger" 
            href="logout.php">
              Salir
          </a>            
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

                  <a href="home.php?filtro=2&pagina=1"  
                  class="nav-link px-3">
                    <span class="me-2">
                      <i class="bi bi-file-earmark-person"></i>
                    </span>
                    <span>
                      Empleados
                    </span>
                  </a>

                </li>
                
                <li>

                  <a href="home.php?filtro=1&pagina=1" 
                  class="nav-link px-3">
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

          <a href = "home-clientes.php?pagina=1" 
          class="nav-link px-3 sidebar-link"               
          role="button">
            <span class="me-2">
            <i class="bi bi-people"></i>
            </span>
            <span>
              Clientes
            </span>                
          </a>

          <a href = "home-productos.php?pagina=1" 
          class="nav-link px-3 sidebar-link"               
          role="button">
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

          <!-- ALERTAS -->

            <?php
              if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">

              <strong>Registrado!</strong> Se agregaron los datos.
              
              <button type="button" 
              class="btn-close" 
              data-bs-dismiss="alert" 
              aria-label="Close"></button>

            </div>

            <?php
              }
            
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">

              <strong>Editado!</strong> Los datos fueron actualizados.

              <button type="button" 
              class="btn-close" 
              data-bs-dismiss="alert" 
              aria-label="Close"></button>

            </div>

            <?php
            }
          
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">

              <strong>Eliminado!</strong> Los datos fueron borrados.

              <button type="button" 
              class="btn-close" 
              data-bs-dismiss="alert" 
              aria-label="Close"></button>

            </div>

            <?php
            }
          
              if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error!</strong> Vuelve a intentar.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
              }               
         
              if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'clienteRepetido'){
            ?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Cliente repetido!</strong> El DNI de este cliente ya esta registrado.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
              }
            ?>

          <!-- ALERTAS -->

            <div class="card-header">
              
              Lista de clientes
              
              <a href="home-clientes.php?pagina=1"
              class="btn btn-light mx-0 px-2 py-1 "                  
              onClick="clearDatos();">

                <i class="bi bi-arrow-clockwise"></i>

              </a>

              <?php

              if($user['rol'] == 1){

              ?>

              <a href="#"
              class="btn btn-light text-success mx-0 px-2 py-1"
              data-bs-toggle="modal" 
              data-bs-target="#staticBackdrop"
              onClick="clearDatos();">

                <i class="bi bi-person-plus-fill"></i>

              </a>

              <?php
              }
              ?>
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
                    
                      foreach ($result_element as $dato) { //COMIENZA EL FOREACH

                    ?>                         

                    <tr>                          

                      <td scope="row" ><?php echo $dato->nombre; ?></td>
                      <td><?php echo $dato->apellido; ?></td>
                      <td><?php echo $dato->dni; ?></td>

                      <td> <?php

                      if($dato->telefono != ""){

                        echo $dato->telefono;   

                      }else{

                        echo "---";

                      }
                      
                      ?> </td>
                    
                      <td>

                        <?php
                        
                        if($user['rol'] == 1){ // *** IF ***

                        ?>

                        <a type="button" 
                        class="btn btn-primary"                           
                        href="editar-cliente.php?id=<?php echo $dato->id ?>&tipo=edit">

                          <i class="bi bi-pencil-square"></i>

                        </a>                            
                      
                        <a type="button" 
                        class="btn btn-danger"
                        href="eliminar-cliente.php?id=<?php echo $dato->id ?>"
                        onclick="return confirm('¿Estas seguro de eliminar a esta persona?');">

                        <i class="bi bi-trash3-fill"></i>

                        </a>
                        
                        <?php

                        }else{ // *** ELSE ***

                        ?>

                        <a type="button" 
                        class="btn btn-info"                           
                        href="editar-cliente.php?id=<?php echo $dato->id ?>&tipo=info">

                          <i class="bi bi-info-square"></i>

                        </a> 

                        <?php

                        } // *** Fin del IF

                        ?>
                    
                      </td>                          

                    </tr>                   
                    
                    <?php

                      } //TERMINA EL FOREACH

                    ?>                  

                  </tbody>                  

                </table>

                <!-- PAGINACIÓN -->
                <?php 
                  if($total_elementos_db > $elemento_x_pagina){
                ?>

                <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-center">

                        <li class="page-item
                          <?php echo $_GET['pagina']<=1? 'disabled' : '' ?>">

                          <a class="page-link" 
                          href="home-clientes.php?pagina=<?php echo $_GET['pagina']-1 ?>">
                            Anterior
                          </a>

                        </li>

                        <?php 
                        for($i=0;$i<$paginas;$i++){
                        ?>

                        <li class="page-item
                          <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">

                          <a class="page-link" 
                          href="home-clientes.php?pagina=<?php echo $i+1 ?>">
                            <?php echo $i+1 ?>
                          </a>

                        </li>

                        <?php 
                        }
                        ?>

                        <li class="page-item
                          <?php echo $_GET['pagina']>=$paginas? 'disabled' : '' ?>">

                          <a class="page-link" 
                          href="home-clientes.php?pagina=<?php echo $_GET['pagina']+1 ?>">
                            Siguiente
                          </a>

                        </li>
                      </ul>
                  </nav>

                  <?php
                  }
                  ?>
                  <!-- PAGINACIÓN -->

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
                  Carga de datos
              </h5>

              <button type="button" 
              class="btn-close" 
              data-bs-dismiss="modal" 
              aria-label="Close">
              </button>

            </div>

              <!-- FORMULARIO -->

            <form action= "registrar-cliente.php"
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

                      <div class= "invalid-feedback">
                        Complete el campo
                      </div>
                    
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

                      <div class= "invalid-feedback">
                        Complete el campo
                      </div>
                    
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
                        maxlength="10" minlenght="10">                       

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

                        <div class= "invalid-feedback">
                          Complete el campo
                        </div>

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

                        <div class= "invalid-feedback">
                          Complete el campo
                        </div>

                    </div>
                    
                    <div class="col-md-6">

                      <input type="text"
                        class="form-control mb-2" 
                        id="txtDireccion"
                        name="txtDireccion"
                        placeholder="Dirección" 
                        value=""
                        autofocus
                        maxlength="100" minlenght="10"
                        required>

                        <div class= "invalid-feedback">
                          Complete el campo
                        </div>

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

<?php include 'template/footerHome.php' ?>