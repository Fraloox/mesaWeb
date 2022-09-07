<?php
    $correo=$_POST['correo'];
    $contrasena=$_POST['contrasena'];

    session_start();
    $_SESSION['correo']=$correo;

    include('db.php');

    $consulta="SELECT*FROM usuarios where correo='$correo' and contrasena='$contrasena'";
    $resultado=mysqli_query($conexion, $consulta);

    $filas=mysqli_num_rows($resultado);

    if($filas){
        header("location:home.php");
    }else{
        ?>
        <?php
            include("index.php");
        ?>
        <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
        <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
    

?>