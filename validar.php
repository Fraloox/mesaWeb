<?php

if(!isset($_POST['txtDni'], $_POST['txtContrasena'])){

    header('Location: index.php?mensaje=error');
    exit();

}

include_once 'conexion.php';

$dni=$_POST['txtDni'];
$contrasena=$_POST['txtContrasena'];   
   
$sentencia = $bd->prepare("SELECT * FROM usuarios WHERE dni = ?;");    
$resultado = $sentencia->execute([$dni]);

    if($resultado === TRUE){ //Verifica si existe el usuario según el DNI               

        $resultado = null;

        $sentencia= $bd->prepare("SELECT*FROM usuarios where dni=? and contrasena=?;");        
        $resultado = $sentencia->execute([$dni, $contrasena]);

        

        if($resultado === TRUE){ //Verifico que la contraseña ingresada sea la misma que la del usuario ingresado

            $user = $sentencia->fetch(PDO::FETCH_OBJ);

            header('Location: home.php?userDni=' .$dni. '&userRol=' .$user->rol);            

        }else{          
            
            header('Location: index.php?mensaje=errorContraseña');
            exit();
            
        }
    }else{
        
        header('Location: index.php?mensaje=noUsuario');
        exit();

    }    
  

?>