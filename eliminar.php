<?php

if(!isset($_GET['id'])){
    header ('Location: home.php?mensaje=error');
    exit();
}

include 'db.php';
include 'conexion.php';

if($_GET['rol'] == 1 ){

    $sentencia = $bd->prepare('SELECT * FROM usuarios WHERE rol = :rol');

    $sentencia->bindParam(':rol', $_GET['rol']);

    $sentencia->execute();

    $fila = $sentencia->rowCount();

    if($fila == 1){

        header ('Location: home.php?mensaje=noAlterar');
        exit();

    }
}
   

$id = $_GET['id'];

$sentencia = $bd->prepare("DELETE FROM usuarios WHERE id = ?;" );
$resultado = $sentencia->execute([$id]);
    
if ($resultado === TRUE) {
    
    header ('Location: home.php?mensaje=eliminado');
    exit();
        
} else {
        
    header ('Location: home.php?mensaje=error');
    exit();
    
}

?>