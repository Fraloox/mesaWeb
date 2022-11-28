<?php

  session_start();

          // *** USER LOGEADO ***

  include_once "conexion.php";

  if(isset($_SESSION['user_id'])){

    $records = $bd->prepare( //Seguir con la comprobacion de cliente o usuario
      'SELECT id, dni 
      FROM cliente
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
 
    header('Location: vistaDeProductos.php?pagina=1');
    exit();

  } 

          // *** USER LOGEADO *** 


          // *** CONTEO PARA SABER CUANTAS PAGINAS SE NECESITA ***

    $sentencia = $bd->prepare("SELECT * FROM productos");
    $sentencia->execute();
    $personas = $sentencia->fetchAll(PDO::FETCH_OBJ);

    $total_elementos_db = $sentencia->rowCount();   

    $elemento_x_pagina = 4; // *** CANTIDAD DE ELEMENTOS POR PAGINA PARA LA PAGINACION ***

    $paginas = $total_elementos_db/$elemento_x_pagina;
    $paginas = ceil($paginas);

          // *** CONTEO PARA SABER CUANTAS PAGINAS SE NECESITA ***

    if($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0){

      header('Location: vistaDeProductos.php?pagina=1');
      exit();

    }


          // *** TRAE LA CANTIDAD DE ELEMENTO POR PAGINA ***

    $iniciar = ($_GET['pagina']-1) * $elemento_x_pagina;
    
    $sentencia_element = $bd->prepare("SELECT * FROM productos LIMIT :iniciar, :nElements");
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

            <div class="card-header">
              
              Lista de productos
              
              <a href="home-productos.php?pagina=1"
              class="btn btn-light mx-0 px-2 py-1 "                  
              onClick="clearDatos();">

                <i class="bi bi-arrow-clockwise"></i>

              </a>
              
            </div>

            <div class="p-4">

              <div class="table-responsive align-middle">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Marca</th>
                      <th scope="col">Stock</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Opciones<th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php
                    
                      foreach ($result_element as $dato) { //COMIENZA EL FOREACH

                    ?>                         

                    <tr>                          

                      <td scope="row" ><?php echo $dato->id; ?></td>
                      <td><?php echo $dato->nombre; ?></td>
                      <td><?php echo $dato->marca; ?></td>
                      <td><?php echo $dato->cantidad; ?></td>
                      <td> $ <?php echo $dato->precio; ?> </td>
                    
                      <td>

                        <a type="button" 
                        class="btn btn-info"                           
                        href="editar-producto.php?id=<?php echo $dato->id ?>&tipo=for-client">

                          <i class="bi bi-info-square"></i>

                        </a>                       
                    
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
                          href="vistaDeProductos.php?pagina=<?php echo $_GET['pagina']-1 ?>">
                            Anterior
                          </a>

                        </li>

                        <?php 
                        for($i=0;$i<$paginas;$i++){
                        ?>

                        <li class="page-item
                          <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">

                          <a class="page-link" 
                          href="vistaDeProductos.php?pagina=<?php echo $i+1 ?>">
                            <?php echo $i+1 ?>
                          </a>

                        </li>

                        <?php 
                        }
                        ?>

                        <li class="page-item
                          <?php echo $_GET['pagina']>=$paginas? 'disabled' : '' ?>">

                          <a class="page-link" 
                          href="vistaDeProductos.php?pagina=<?php echo $_GET['pagina']+1 ?>">
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
    
  </div>

</div>

</main>
<!-- CRUD --> 

<?php include 'template/footerHome.php' ?>