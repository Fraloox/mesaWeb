<?php
    
    print_r($_POST);

    include_once 'conexion.php';

    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $telefono = $_POST["txtTelefono"];
    $dni = $_POST["txtDni"];
    $email = $_POST["txtEmail"];
    $contrasena = $_POST["txtContrasena"];
    $rol = $_POST["sctRol"];
    $direccion = $_POST["txtDireccion"];

    $sentencia = $bd->prepare(
        "INSERT INTO usuarios(nombre, apellido, telefono, dni, email, contrasena, rol, direccion)
        VALUES (?,?,?,?,?,?,?,?);");
    
    $resultado = $sentencia->execute([$nombre,$apellido,$telefono,$dni,$email, $contrasena,$rol,$direccion]);


    if($resultado === TRUE){

        header('Location: home.php?mensaje=registrado');

    }else{
        include("home.php");
        echo "<script> mostrarError('Error al dar de alta'); </script>";

    }
?>