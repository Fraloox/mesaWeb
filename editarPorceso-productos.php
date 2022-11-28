<?php

if(!isset($_POST['id'])){    
    header('Location: home-productos.php?mensaje=error&pagina=1');
    exit();
}

include 'conexion.php';

$id = $_POST['id'];
$nombre = $_POST["txtNombre"];
$cantidad = $_POST["txtCantidad"];
$marca = $_POST["txtMarca"];
$precio = $_POST["txtPrecio"];
$descripcion = $_POST["txtDescripcion"];

$sentencia = $bd->prepare(
    'UPDATE productos 
    SET nombre = :nombre, cantidad = :cantidad, marca = :marca, 
    precio = :precio, descripcion = :descripcion 
    WHERE id = :id');

// *** SET ***
$sentencia->bindParam(':nombre', $nombre);
$sentencia->bindParam(':cantidad', $cantidad);
$sentencia->bindParam(':marca', $marca);
$sentencia->bindParam(':precio', $precio);
$sentencia->bindParam(':descripcion', $descripcion);

// *** WHERE ***
$sentencia->bindParam(':id', $id);

$sentencia->execute();

header('Location: home-productos.php?mensaje=editado&pagina=1');
exit();

?>