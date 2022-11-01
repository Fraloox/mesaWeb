<?php
    
    include('db.php');

    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $telefono = $_POST["txtTelefono"];
    $dni = $_POST["txtDni"];
    $email = $_POST["txtEmail"];
    $rol = $_POST["sctRol"];
    $direccion = $_POST["txtDireccion"];

    $sentencia = $bd->prepare(
        "INSERT INTO usuarios(nombre, apellido, telefono, dni, email, rol, direccion)
        VALUES (?,?,?);");
    
    $resultado= $sentencia->execute(
        [$nombre, $apellido, $telefono, $dni, $email, $rol, $direccion]);


    if($resultado === TRUE){

        echo 'OK';
    }else{
        echo 'NO';
    }
?>