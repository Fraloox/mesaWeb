<?php

if(!isset($_GET['id'])){
    header ('Location: home.php?mensaje=error');
    exit();
}

include 'db.php';
include 'conexion.php';

if($_GET['rol'] == 1 ){

    $sql = "SELECT COUNT(*) total FROM usuarios WHERE rol = 1;";
    $resultado = $mysqli->query($sql);
    $fila = $resultado->fetch_assoc();

    if($fila['total'] == 1){

        header ('Location: home.php?mensaje=noBorrar');

    }
}
    
$id = $_GET['id'];

$sentencia = $bd->prepare("DELETE FROM usuarios WHERE id = ?;" );
$resultado = $sentencia->execute([$id]);
    
if ($resultado === TRUE) {
    
    header ('Location: home.php?mensaje=eliminado');
        
} else {
        
    header ('Location: home.php?mensaje=error');
    
}

?>