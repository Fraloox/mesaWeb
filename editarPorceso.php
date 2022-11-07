<?php

print_r($_POST);

if(!isset($_POST['id'])){
    header('Location: home.php?mensaje=error');
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
    "UPDATE usuarios 
    SET nombre = ?, apellido = ?, telefono = ?, email = ?, contrasena = ?, direccion = ?, rol = ? 
    WHERE id = ?;" );

$resultado = $sentencia->execute(
    [$nombre, $apellido, $telefono, $email, $contrasena, $direccion, $rol, $id]);

if ($resultado === TRUE) {
    
    header('Location: home.php?mensaje=editado');

} else {

    header('Location: home.php?mensaje=error');
    exit();

}

?>