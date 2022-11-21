<?php   

    include_once 'conexion.php';
    include 'db.php';

    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $telefono = $_POST["txtTelefono"];
    $dni = $_POST["txtDni"];
    $email = $_POST["txtEmail"];
    $contrasena = $_POST["txtContrasena"];
    $rol = $_POST["sctRol"];
    $direccion = $_POST["txtDireccion"];

    $sql = "SELECT COUNT(*) total FROM usuarios WHERE dni = '$dni';";
    $resultado = $mysqli->query($sql);
    $fila = $resultado->fetch_assoc();

    if($fila['total'] == 1){

        header ('Location: home.php?mensaje=usuarioRepetido');
        exit();

    }else{

        $sentencia = $bd->prepare(
            "INSERT INTO usuarios(nombre, apellido, telefono, dni, email, contrasena, rol, direccion)
            VALUES (?,?,?,?,?,?,?,?);");
        
        $resultado = $sentencia->execute([$nombre,$apellido,$telefono,$dni,$email, $contrasena,$rol,$direccion]);
    
    
        if($resultado === TRUE){
    
            header('Location: home.php?mensaje=registrado');
            exit();

        }else{

            header('Location: home.php?mensaje=error');
            exit();
    
        }

    }

    
?>