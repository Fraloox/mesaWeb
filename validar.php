<?php
    $dni=$_POST['dni'];
    $contrasena=$_POST['contrasena'];    

    
    session_start();
    $_SESSION['dni']=$dni;
    
    include('db.php');
    
    $consulta="SELECT*FROM usuarios where dni='$dni'";
    
    $resultado=mysqli_query($mysqli, $consulta);

    $filas=mysqli_num_rows($resultado);

    if($filas){ //Verifica si existe el usuario según el DNI
        $resultado= null;

        $filas= null;

        $consulta="SELECT*FROM usuarios where dni='$dni' and contrasena='$contrasena'";
        
        $resultado=mysqli_query($mysqli, $consulta);

        $filas=mysqli_num_rows($resultado);

        if($filas){ //Verifico que la contraseña ingresada sea la misma que la del usuario ingresado
            header("location:home.php");
        }else{          
            
            include("index.php");
            echo "<script> mostrarError('Contraseña Incorrecta'); </script>";
        }
    }else{
        
        include("index.php");
        echo "<script> mostrarError('No se encontró al usuario'); </script>";

    }    
    
    mysqli_free_result($resultado);
    mysqli_close($conexion);    

?>