<?php

if(!isset($_GET['id'])){
    header ('Location: home-productos.php?mensaje=error&pagina=1');
    exit();
}

include 'db.php';
include 'conexion.php';   

$id = $_GET['id'];

$sentencia = $bd->prepare("DELETE FROM productos WHERE id = ?;" );
$resultado = $sentencia->execute([$id]);
    
if ($resultado === TRUE) {
    
    header ('Location: home-productos.php?mensaje=eliminado&pagina=1');
    exit();
        
} else {
        
    header ('Location: home-productos.php?mensaje=error&pagina=1');
    exit();
    
}

?>