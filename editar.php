<?php include 'template/headerHome.php' ?>


<?php 

session_start();

if(empty($_GET['id'])){

    header('Location: home.php?mensaje=error');
    exit();

}

include_once 'conexion.php';

$id = $_GET['id'];


$sentencia = $bd->prepare("SELECT * FROM usuarios WHERE id = :id");
$sentencia->bindParam(':id', $id);
$sentencia->execute();
$results = $sentencia->fetch(PDO::FETCH_ASSOC);

$persona = null;

if(!empty($results)){

    $persona = $results;

}


?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

<div class="container-fluid">

  <a class="navbar-brand fw-bold text-uppercase me-auto" 
  href="home.php?pagina=1">
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
                    <?php echo $_GET['tipo']=='info' ? 'Ver datos':'Editar datos'?>
                </div>

                <!-- FORMULARIO -->

                <form class="p-4" method="POST" 
                action="editarPorceso.php">

                    <input type="hidden" 
                    name="id"
                    value="<?php echo $persona['id']; ?>">

                    <div class="modal-body">

                        <div class="container">                    

                            <div class="row">

                                <div class="col-md-6">
                                    
                                    <label class="form-label">
                                        Nombre:
                                    </label>

                                    <input type="text"
                                    class="form-control mb-2"
                                    id="txtNombre" 
                                    name="txtNombre"
                                    placeholder= "Nombre"
                                    value="<?php echo $persona['nombre']; ?>"
                                    autofocus
                                    maxlength="20" minlenght="3"
                                    <?php echo $_GET['tipo']=='info' ? 'readonly':'required'?> >
                        
                                </div>

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Apellido:
                                    </label>
                  
                                    <input type="text"
                                    class="form-control mb-2"
                                    id="txtApellido" 
                                    name="txtApellido"
                                    placeholder= "Apellido"
                                    value="<?php echo $persona['apellido']; ?>"  
                                    autofocus
                                    maxlength="20" minlenght="3"
                                    <?php echo $_GET['tipo']=='info' ? 'readonly':'required'?> >
                        
                                </div>

                            </div>
                      
                            <div class="row">                       

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Teléfono:
                                    </label>

                                    <input type="text"
                                    class="form-control mb-2" 
                                    id="txtTelefono"
                                    name="txtTelefono"
                                    placeholder= "Teléfono" 
                                    value="<?php echo $persona['telefono']; ?>"
                                    autofocus
                                    pattern="[0-9]+" 
                                    maxlength="10" minlenght="10"
                                    <?php echo $_GET['tipo']=='info' ? 'readonly':'required'?> >

                                </div>

                                <div class="col-md-6">

                                    <label class="form-label">
                                        DNI:
                                    </label>

                                    <input type="text"
                                    class="form-control mb-2"
                                    id="txtDni" 
                                    name="txtDni"
                                    placeholder= "DNI" 
                                    value="<?php echo $persona['dni']; ?>"                                   
                                    pattern="[0-9]+"  
                                    disabled>

                                </div>                        

                            </div>

                            <div class="row mt-2">

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Email:
                                    </label>

                                    <input type="text"
                                    class="form-control mb-2"
                                    id="txtEmail" 
                                    name="txtEmail"
                                    placeholder="Email" 
                                    value="<?php echo $persona['email']; ?>"                            
                                    autofocus
                                    maxlength="30" minlenght="3"
                                    <?php echo $_GET['tipo']=='info' ? 'readonly':'required'?> >

                                </div>
                        
                                <div class="col-md-6 input-group w-50 h-100 pointer">

                                    <label class="form-label input-group">
                                        Contraseña:
                                    </label>                                    

                                    <input type="password"
                                    class="form-control" 
                                    name="txtContrasena"
                                    placeholder="Contraseña"
                                    value="<?php echo $persona['contrasena']; ?>" 
                                    id="txtContrasena"
                                    maxlength="20" minlenght="5"
                                    <?php echo $_GET['id'] != $_SESSION['user_id']? 'readonly': 'required'?> > 
                          
                                    <span class="input-group-text"
                                    <?php
                                    if($_GET['id'] != $_SESSION['user_id']){ //Solo deja ver la contraseña si es el usuario logueado
                                        echo "disabled";
                                    }else{
                                    ?>
                                        onclick="vista_form();"
                                        required
                                    <?php
                                    }
                                    ?> >
                                        <i class="bi bi-eye" id="ver"></i>
                                        <i class="bi bi-eye-slash" id="ocultar" style="display:none;"></i>
                                    </span>
                                                                          

                                </div>                                            

                            </div>

                            <div class="row mt-2">

                                <div class="col-md-7">

                                    <label class="form-label">
                                        Dirección:
                                    </label>

                                    <input type="text"
                                    class="form-control mb-2" 
                                    id="txtDireccion"
                                    name="txtDireccion"
                                    placeholder="Dirección" 
                                    value="<?php echo $persona['direccion']; ?>"
                                    autofocus
                                    maxlength="100" minlenght="10"
                                    <?php echo $_GET['tipo']=='info' ? 'readonly':'required'?>>

                                </div>

                                <div class="col-md-5">

                                    <label class="form-label">
                                        Rol:
                                    </label>
                                                
                                    <select class="form-select mb-2 pointer" 
                                        aria-label="Default select example"
                                        id="sctRol"
                                        name="sctRol"
                                        <?php echo $_GET['tipo']=='info' ? 'disabled':'required'?> >

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

                        <?php

                        if(isset($_GET['tipo']) and $_GET['tipo'] == 'edit'){

                        ?>

                        
                        <a type="button" 
                        class="btn btn-secondary mx-3" 
                        href="home.php">
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
                        href="home.php" >
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

<script>

document.getElementById("sctRol").value = <?php echo $persona['rol']; ?>;

</script>


<?php include 'template/footerHome.php' ?>


