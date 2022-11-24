<?php 
include("../Admin/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

<script src="../Alert/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../Alert/sweetalert.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

 <!-- ESTILO CURSOS DE PROGRAMACION -->
 <link rel="stylesheet" href="../css/style_cp.css">


<title>Consulta basica</title>
</head>
<body>



<style>
.container_card{
    margin: 0 auto;
    padding:  0px 20px 20px 20px;
    display: grid;
    /* width: 800px; */
    grid-template-columns: 1fr 1fr ;
    grid-gap:1em;
        /* grid-row-gap: 60px; */
}

.blog-post{
    position: relative;
    margin-bottom: 15px;
    margin: 30px;
}

.blog-post img{
    width: 100%;
    height: 450px;
    object-fit: cover;
    border-radius: 10px;
    }

.blog-post .category{
    position: absolute;
    top: 20px;
    left: 20px;
    padding: 10px 15px;
  font-size: 14px;    text-decoration: none;
    background-color: #e67e22;
    color: #fff;
    border-radius: 5px;
    box-shadow: 1px 1px 8px rgba(0,0,0,0.1);
    text-transform: uppercase;
}
.text-content{
    position: absolute;
    bottom: -30px;
    padding: 20px;
    background-color: #fff;
    width: calc(100% - 20px);
    left: 50%;
    transform: translateX(-50%);
    border-radius: 10px;
    box-shadow: 1px 1px 8px rgba(0,0,0,0.08);
    padding-top: 50px;
}

.text-content h2{
    font-size: 20px;
    font-weight: 400;
    /* margin-bottom: 30px; */
}

.text-content img{
    height: 70px;
    width: 70px;
    border: 5px solid rgba(0,0,0,0.1);
    border-radius: 50%;
    position: absolute;
    top: -35px;
    left: 35px;
}

.tags a{
    color: #888;
    font-weight: 700;
    text-decoration: none;
    margin-right: 15px;
    transition: 0.3s ease;
}

.tags a:hover{
    color: #000;
}

@media screen and (max-width: 1100px) {
    .container_card{
        grid-template-columns: 1fr 1fr;
        grid-row-gap: 60px;
    }
}

@media screen and (max-width: 600px) {
    .container_card{
        grid-template-columns: 1fr;
        grid-row-gap: 60px;
    }
}
</style>


<!-- NAVBAR -->
<?php include("../Admin/navbar.php"); ?>
<!-- END NAVBAR -->





<!-- vista A -->
<div class="center mt-5">
    <div class="card pt-3" >
            <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Paginar resultados Vista 1</p>
        <div class="container-fluid p-2">
            <?php 
  if(!empty($_REQUEST["nume"])){ $_REQUEST["nume"] = $_REQUEST["nume"];}else{ $_REQUEST["nume"] = '1';}
            if($_REQUEST["nume"] == "" ){$_REQUEST["nume"] = "1";}
            $articulos=mysqli_query($conexion,"SELECT * FROM articulos_cp  ;");
            $num_registros=@mysqli_num_rows($articulos);
            $registros= '3';
            $pagina=$_REQUEST["nume"];
            if (is_numeric($pagina))
            $inicio= (($pagina-1)*$registros);
            else
            $inicio=0;
            $busqueda=mysqli_query($conexion,"SELECT * FROM articulos_cp LIMIT $inicio,$registros;");
            $paginas=ceil($num_registros/$registros);
            
            ?>
            <h5 class="card-tittle">Resultados (<?php echo $num_registros; ?>)</h5>
            <div class="container_card">
                <?php while ($resultado = mysqli_fetch_assoc($busqueda)){ ?>
                    <div class="blog-post ">
                        <img src="../Insertar artículo/articulos/<?php echo $resultado["img"]; ?>.jpg" alt="Man">
                        <a  target="_blank" class="category">
                        <?php echo $resultado["categoria"]; ?>
                        </a>
                        <div class="text-content">
                            <img src="../Libreria/images/logo.jpg" alt="">
                            <h2 class="post-title">
                            <?php echo $resultado["titulo"]; ?>
                            </h2>
                            <p><?php echo $resultado["descripcion"]; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>


        <!-- paginacion //////////////////////////////////////-->
    <div class="container-fluid  col-12">
        <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;" >
            <li class="page-item">
            <?php
            if($_REQUEST["nume"] == "1" ){
            $_REQUEST["nume"] == "0";
            echo  "";
            }else{
            if ($pagina>1)
            $ant = $_REQUEST["nume"] - 1;
            echo "<a class='page-link' aria-label='Previous' href='index.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>"; 
            echo "<li class='page-item '><a class='page-link' href='index.php?nume=". ($pagina-1) ."' >".$ant."</a></li>"; }
            echo "<li class='page-item active'><a class='page-link' >".$_REQUEST["nume"]."</a></li>"; 
            $sigui = $_REQUEST["nume"] + 1;
            $ultima = $num_registros / $registros;
            if ($ultima == $_REQUEST["nume"] +1 ){
            $ultima == "";}
            if ($pagina<$paginas && $paginas>1)
            echo "<li class='page-item'><a class='page-link' href='index.php?nume=". ($pagina+1) ."'>".$sigui."</a></li>"; 
            if ($pagina<$paginas && $paginas>1)
            echo "
            <li class='page-item'><a class='page-link' aria-label='Next' href='index.php?nume=". ceil($ultima) ."'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
            </li>";
            ?>
        </ul>
    </div>
<!-- end paginacion ///////////////////////// -->




    </div>
</div>

<!-- END vista A -->







<!-- vista B -->
<div class="center mt-5">
    <div class="card pt-3" >
            <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Paginar resultados Vista 2</p>
        <div class="container-fluid p-2">
<table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Nombre</th>
<th scope="col">Categoria</th>
<th scope="col">Detalle</th>
</tr>
</thead>
<tbody>
            <?php 
            
            if($_REQUEST["nume"] == "" ){$_REQUEST["nume"] = "1";}
            $articulos=mysqli_query($conexion,"SELECT * FROM articulos_cp  ;");
            $num_registros=@mysqli_num_rows($articulos);
            $registros= '3';
            $pagina=$_REQUEST["nume"];
            if (is_numeric($pagina))
            $inicio= (($pagina-1)*$registros);
            else
            $inicio=0;
            $busqueda=mysqli_query($conexion,"SELECT * FROM articulos_cp LIMIT $inicio,$registros;");
            $paginas=ceil($num_registros/$registros);
            
            ?>
            <h5 class="card-tittle">Resultados (<?php echo $num_registros; ?>)</h5>
            <div class="container_card">
                <?php while ($resultado = mysqli_fetch_assoc($busqueda)){
                     if(!empty($num)){ $num = $num++;}else{ $num = '0';}
                  $num++;
                  ?>
<tr>
<th scope="row"><?php echo $num; ?></th>
<td><?php echo $resultado["titulo"]; ?></td>
<td><?php echo $resultado["categoria"]; ?></td>
<td><?php echo $resultado["descripcion"]; ?></td>
</tr>    

                <?php } ?>

</tbody>
</table>
            </div>
        </div>

     <!-- paginacion //////////////////////////////////////-->
     <div class="container-fluid  col-12">
        <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;" >
            <li class="page-item">
            <?php
            if($_REQUEST["nume"] == "1" ){
            $_REQUEST["nume"] == "0";
            echo  "";
            }else{
            if ($pagina>1)
            $ant = $_REQUEST["nume"] - 1;
            echo "<a class='page-link' aria-label='Previous' href='index.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>"; 
            echo "<li class='page-item '><a class='page-link' href='index.php?nume=". ($pagina-1) ."' >".$ant."</a></li>"; }
            echo "<li class='page-item active'><a class='page-link' >".$_REQUEST["nume"]."</a></li>"; 
            $sigui = $_REQUEST["nume"] + 1;
            $ultima = $num_registros / $registros;
            if ($ultima == $_REQUEST["nume"] +1 ){
            $ultima == "";}
            if ($pagina<$paginas && $paginas>1)
            echo "<li class='page-item'><a class='page-link' href='index.php?nume=". ($pagina+1) ."'>".$sigui."</a></li>"; 
            if ($pagina<$paginas && $paginas>1)
            echo "
            <li class='page-item'><a class='page-link' aria-label='Next' href='index.php?nume=". ceil($ultima) ."'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
            </li>";
            ?>
        </ul>
    </div>
<!-- end paginacion ///////////////////////// -->

    </div>
</div>
<!-- END vista B -->






<!-- vista C -->
<div class="center mt-5">
    <div class="card pt-3" >
            <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Paginar resultados Vista 3</p>
        <div class="container-fluid p-2">
<table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Imagen</th>
<th scope="col">Nombre</th>
<th scope="col">Categoria</th>
<th scope="col">Detalle</th>
</tr>
</thead>
<tbody>
            <?php 
            
            if($_REQUEST["nume"] == "" ){$_REQUEST["nume"] = "1";}
            $articulos=mysqli_query($conexion,"SELECT * FROM articulos_cp  ;");
            $num_registros=@mysqli_num_rows($articulos);
            $registros= '3';
            $pagina=$_REQUEST["nume"];
            if (is_numeric($pagina))
            $inicio= (($pagina-1)*$registros);
            else
            $inicio=0;
            $busqueda=mysqli_query($conexion,"SELECT * FROM articulos_cp LIMIT $inicio,$registros;");
            $paginas=ceil($num_registros/$registros); 
            
            ?>
            <h5 class="card-tittle">Resultados (<?php echo $num_registros; ?>)</h5>
            <div class="container_card">
                <?php while ($resultado = mysqli_fetch_assoc($busqueda)){
                  $num++;
                  ?>
<tr>
<th scope="row" style="vertical-align: middle;"><?php echo $num; ?></th>
<td><img src="../Insertar artículo/articulos/<?php echo $resultado["img"]; ?>.jpg" alt="" width="100px"></td>
<td style="vertical-align: middle;"><?php echo $resultado["titulo"]; ?></td>
<td style="vertical-align: middle;"><?php echo $resultado["categoria"]; ?></td>
<td style="vertical-align: middle;"><?php echo $resultado["descripcion"]; ?></td>
</tr>    

                <?php } ?>

</tbody>
</table>
            </div>
        </div>

     <!-- paginacion //////////////////////////////////////-->
     <div class="container-fluid  col-12">
        <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;" >
            <li class="page-item">
            <?php
            if($_REQUEST["nume"] == "1" ){
            $_REQUEST["nume"] == "0";
            echo  "";
            }else{
            if ($pagina>1)
            $ant = $_REQUEST["nume"] - 1;
            echo "<a class='page-link' aria-label='Previous' href='index.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>"; 
            echo "<li class='page-item '><a class='page-link' href='index.php?nume=". ($pagina-1) ."' >".$ant."</a></li>"; }
            echo "<li class='page-item active'><a class='page-link' >".$_REQUEST["nume"]."</a></li>"; 
            $sigui = $_REQUEST["nume"] + 1;
            $ultima = $num_registros / $registros;
            if ($ultima == $_REQUEST["nume"] +1 ){
            $ultima == "";}
            if ($pagina<$paginas && $paginas>1)
            echo "<li class='page-item'><a class='page-link' href='index.php?nume=". ($pagina+1) ."'>".$sigui."</a></li>"; 
            if ($pagina<$paginas && $paginas>1)
            echo "
            <li class='page-item'><a class='page-link' aria-label='Next' href='index.php?nume=". ceil($ultima) ."'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
            </li>";
            ?>
        </ul>
    </div>
<!-- end paginacion ///////////////////////// -->

    </div>
</div>
<!-- END vista C -->





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>

</body>
</html>









<?php 
 if(!empty($_REQUEST["insert"])){ 
if ($_REQUEST["insert"] == 'ok'){
  echo '
  <script>
    JSalert("Insertado correctamente");
  </script>
  ';
}
 }
?>