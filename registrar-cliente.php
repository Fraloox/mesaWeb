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

?>