<?php

include 'conexion.php';

$id = 11;

$sentencia = $bd->prepare("SELECT * FROM usuarios WHERE id = :id");
$sentencia->bindParam(':id', $id);
$sentencia->execute();
$results = $sentencia->fetch(PDO::FETCH_ASSOC);

$password = $results['contrasena'];

echo $password;

?>
