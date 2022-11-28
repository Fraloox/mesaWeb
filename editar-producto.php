<?php include 'template/headerHome.php' ?>


<?php 

session_start();

if(empty($_GET['id'])){

    header('Location: home-productos.php?mensaje=error&pagina=1');
    exit();

}

include_once 'conexion.php';

$id = $_GET['id'];

$sentencia = $bd->prepare("SELECT * FROM productos WHERE id = :id");
$sentencia->bindParam(':id', $id);
$sentencia->execute();
$results = $sentencia->fetch(PDO::FETCH_ASSOC);

$producto = null;

if(!empty($results)){

    $producto = $results;

}


?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

<div class="container-fluid">

  <a class="navbar-brand fw-bold text-uppercase me-auto" 
  href="<?php echo $_GET['tipo']=='for-client' ? 'vistaDeProductos.php?pagina=1':'home.php?pagina=1' ?>">
    C.P.C.®
  </a>  

</div>

</nav>
<!-- NAVBAR -->

<div class="container mt-5 pt-3">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card">

                <div class="card-header">
                    Editar datos:
                </div>

                <!-- FORMULARIO -->

                <form class="p-4" method="POST" 
                action="editarPorceso-productos.php">

                    <input type="hidden" 
                    name="id"
                    value="<?php echo $producto['id']; ?>">

                    <div class="modal-body">

                        <div class="container">                    

                            <div class="row">

                                <div class="col-md-8">  
                                    
                                    <label class="form-label">
                                        Nombre:
                                    </label>

                                    <input type="text"
                                    class="form-control mb-2"
                                    id="txtNombre" 
                                    name="txtNombre"
                                    placeholder= "Nombre"
                                    value="<?php echo $producto['nombre']; ?>"
                                    autofocus
                                    maxlength="50" minlenght="3"
                                    <?php echo $_GET['tipo']=='info'||$_GET['tipo']=='for-client' ? 'readonly':'required'?>>
                        
                                </div>

                                <div class="col-md-4">
                                    
                                    <label class="form-label">
                                        Cantidad:
                                    </label>

                                    <input type="number"
                                    class="form-control mb-2"
                                    id="txtCantidad" 
                                    name="txtCantidad"
                                    placeholder= "Cantidad"
                                    value="<?php echo $producto['cantidad']; ?>"
                                    autofocus                         
                                    min="0"
                                    <?php echo $_GET['tipo']=='info'||$_GET['tipo']=='for-client' ? 'readonly':'required'?>>

                                    <div class= "invalid-feedback">
                                        Complete el campo
                                    </div>
                    
                                </div>

                            </div>
                      
                            <div class="row">                       

                                <div class="col-md-8">

                                    <label class="form-label">
                                        Marca:
                                    </label>

                                    <input type="text"
                                    class="form-control mb-2" 
                                    id="txtMarca"
                                    name="txtMarca"
                                    placeholder= "Marca" 
                                    value="<?php echo $producto['marca']; ?>"
                                    autofocus                       
                                    maxlength="30" minlenght="30"
                                    <?php echo $_GET['tipo']=='info' ? 'readonly':'required'?>>                       

                                </div>

                                <div class="col-md-4 ">

                                    <label class="form-label">
                                        Precio:
                                    </label> 
                                    
                                    

                                    <input type="number"
                                    class="form-control mb-2"
                                    id="txtPrecio" 
                                    name="txtPrecio"
                                    placeholder= "Precio" 
                                    value="<?php echo $producto['precio']; ?>"
                                    autofocus
                                    step="0.01"                         
                                    min="0"
                                    <?php echo $_GET['tipo']=='info' ? 'readonly':'required'?>>

                                    

                                    <div class= "invalid-feedback">
                                    Complete el campo
                                    </div>

                                </div>

                            </div>

                            <div class="row mt-2 mb-2">
                    
                                <label class="form-label">
                                Descripción:
                                </label>

                                <div class="input-group">  
                                    <textarea id= "txtDescripcion"
                                    name="txtDescripcion"
                                    class="form-control"                      
                                    maxlength="500"
                                    cols="80"                                    
                                    <?php echo $_GET['tipo']=='info' ? 'readonly':'required'?>
                                    ><?php echo $producto['descripcion']; ?></textarea>
                                </div>      

                            </div>                         

                        </div>

                    </div>

                    <div class="modal-footer">

                        <div class="w-100 h-100" id="error-alert"> <!-- Esta es la alerta de error -->
                            Mensaje de error
                        </div>

                        <?php

                        if(isset($_GET['tipo']) and $_GET['tipo'] == 'edit'){

                        ?>

                        
                        <a type="button" 
                        class="btn btn-secondary mx-3" 
                        href="home-productos.php?pagina=1">
                            Cancelar
                        </a>

                        <button type="submit" 
                        class="btn btn-primary">
                            Guardar
                        </button>

                        <?php

                        }else{
                        
                        ?>

                        <a type="button" 
                        class="btn btn-primary" 
                        href="<?php echo $_GET['tipo']=='for-client' ? 'vistaDeProductos.php?pagina=1' :'home-productos.php?pagina=1' ?>" >
                            Volver
                        </a>   

                        <?php

                        }

                        ?>

                  
                    </div>
                </form>                

                <!-- FORMULARIO -->

            </div>

        </div>

    </div>

</div>

<?php include 'template/footerHome.php' ?>