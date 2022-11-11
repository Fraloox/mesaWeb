<?php
    $dni=$_POST['txtDni'];
    $contrasena=$_POST['txtContrasena'];    

    
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

            header('Location: home.php?dni=' .$dni);            

        }else{          
            
            header('Location: index.php?mensaje=errorContraseña');
            exit();
            
        }
    }else{
        
        header('Location: index.php?mensaje=noUsuario');
        exit();

    }    
    
    mysqli_free_result($resultado);
    mysqli_close($conexion);    

?>