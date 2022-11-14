<?php include 'template/headerHome.php' ?>


<?php 

$userDni = $_GET['userDni'];
$userRol = $_GET['userRol'];

if(!isset($_GET['id'])){

    header('Location: home.php?mensaje=error&userDni=' .$userDni. '&userRol=' .$userRol);
    exit();

}

include_once 'conexion.php';
$id = $_GET['id'];

$sentencia = $bd->prepare("SELECT * FROM usuarios WHERE id = ?;");

$resultado = $sentencia->execute([$id]);

if ($resultado === TRUE){

    $persona = $sentencia->fetch(PDO::FETCH_OBJ);

}else{

    header('Location: home.php?mensaje=error&userDni=' .$userDni. '&userRol=' .$userRol);

}


?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

<div class="container-fluid">

  <a class="navbar-brand fw-bold text-uppercase me-auto" 
  href="home.php?dni=<?php echo $userDni ?>&userRol=<?php echo $userRol ?>">
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
                action="editarPorceso.php?userDni=<?php echo $userDni ?>&userRol=<?php echo $userRol ?>">

                    <input type="hidden" 
                    name="id"
                    value="<?php echo $persona->id; ?>">

                    <div class="modal-body">

                        <div class="container">                    

                            <div class="row">

                                <div class="col-md-6">                          

                                    <input type="text"
                                    class="form-control mb-2"
                                    id="txtNombre" 
                                    name="txtNombre"
                                    placeholder= "Nombre"
                                    value="<?php echo $persona->nombre; ?>"
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
                                    value="<?php echo $persona->apellido; ?>"  
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
                                    value="<?php echo $persona->telefono; ?>"
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
                                    value="<?php echo $persona->dni; ?>"                                   
                                    pattern="[0-9]+" 
                                    aria-label="Disabled input example" 
                                    disabled>

                                </div>                        

                            </div>

                            <div class="row mt-2">

                                <div class="col-md-6">

                                    <input type="text"
                                    class="form-control mb-2"
                                    id="txtEmail" 
                                    name="txtEmail"
                                    placeholder="Email" 
                                    value="<?php echo $persona->email; ?>"                            
                                    autofocus
                                    maxlength="30" minlenght="3"
                                    required>

                                </div>
                        
                                <div class="col-md-6 input-group w-50 h-100">

                                    <input type="password"
                                    class="form-control" 
                                    name="txtContrasena"
                                    placeholder="Contraseña"
                                    value="<?php echo $persona->contrasena; ?>" 
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
                                    value="<?php echo $persona->direccion; ?>"
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

                        <a type="button" 
                        class="btn btn-secondary mx-3" 
                        href="home.php?userDni=<?php echo $userDni ?>&userRol=<?php echo $userRol ?>" >
                            Cancelar
                        </a>

                        <button type="submit" 
                        class="btn btn-primary">Guardar</button>
                  
                    </div>
                </form>

                <!-- FORMULARIO -->

            </div>

        </div>

    </div>

</div>

<script>

document.getElementById("sctRol").value = <?php echo $persona->rol; ?>;

</script>


<?php include 'template/footerHome.php' ?>


