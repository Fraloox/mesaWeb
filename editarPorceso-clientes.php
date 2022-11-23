<?php

if(!isset($_POST['id'])){    
    header('Location: home-clientes.php?mensaje=error');
    exit();
}

include 'conexion.php';

$id = $_POST['id'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$telefono = $_POST['txtTelefono'];
$email = $_POST['txtEmail'];
$direccion = $_POST['txtDireccion'];

$sentencia = $bd->prepare(
    'UPDATE clientes 
    SET nombre = :nombre, apellido = :apellido, telefono = :telefono, 
    email = :email, direccion = :direccion 
    WHERE id = :id');

// *** SET ***
$sentencia->bindParam(':nombre', $nombre);
$sentencia->bindParam(':apellido', $apellido);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':direccion', $direccion);

// *** WHERE ***
$sentencia->bindParam(':id', $id);

$sentencia->execute();

header('Location: home-clientes.php?mensaje=editado');
exit();

?>