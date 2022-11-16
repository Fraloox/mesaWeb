<?php

$userDni = $_POST['txtDni'];
$userPass = $_POST['txtContrasena']; 

include 'conexion.php';  
   
$sentencia = $bd->prepare("SELECT * FROM usuarios WHERE dni = ?;" );    
$resultado = $sentencia->execute([$userDni]);

    if($resultado === TRUE){ //Verifica si existe el usuario según el DNI               

        $user = $sentencia->fetch(PDO::FETCH_OBJ);       

        if($user->contrasena == $userPass){ //Verifico que la contraseña ingresada sea la misma que la del usuario ingresado
            
            $action = "home.php";
            

            //include 'template/inputsDatos.php';

            //header('Location: home.php?userDni=' .$dni. '&userRol=' .$user->rol);            

        }else{          
            
            //header('Location: index.php?mensaje=errorContraseña');
            echo "Error de contraseña";
            
        }

    }else{
        
        //header('Location: index.php?mensaje=noUsuario');
        echo "Error de DNI";        

    }    
  

?>

