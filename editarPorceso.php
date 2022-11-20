<?php

if(!isset($_POST['id'])){    
    header('Location: home.php');
}

include 'conexion.php';

$id = $_POST['id'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$telefono = $_POST['txtTelefono'];
$email = $_POST['txtEmail'];
$contrasena = $_POST['txtContrasena'];
$direccion = $_POST['txtDireccion'];
$rol = $_POST['sctRol'];

$sentencia = $bd->prepare(
    'UPDATE usuarios 
    SET nombre = :nombre, apellido = :apellido, telefono = :telefono, 
    email = :email, contrasena = :contrasena, direccion = :direccion, rol = :rol 
    WHERE id = :id');

// *** SET ***
$sentencia->bindParam(':nombre', $nombre);
$sentencia->bindParam(':apellido', $apellido);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':contrasena', $contrasena);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam(':rol', $rol);

// *** WHERE ***
$sentencia->bindParam(':id', $id);

$sentencia->execute();

header('Location: home.php?mensaje=editado');

?>