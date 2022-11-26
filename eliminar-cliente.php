<?php

if(!isset($_GET['id'])){
    header ('Location: home-clientes.php?mensaje=error&pagina=1');
    exit();
}

include 'db.php';
include 'conexion.php';   

$id = $_GET['id'];

$sentencia = $bd->prepare("DELETE FROM clientes WHERE id = ?;" );
$resultado = $sentencia->execute([$id]);
    
if ($resultado === TRUE) {
    
    header ('Location: home-clientes.php?mensaje=eliminado&pagina=1');
    exit();
        
} else {
        
    header ('Location: home-clientes.php?mensaje=error&pagina=1');
    exit();
    
}

?>