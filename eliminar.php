<?php

$userDni = $_GET['userDni'];
$userRol = $_GET['userRol'];

if(!isset($_GET['id'])){
    header ('Location: home.php?mensaje=error&userDni=' .$userDni. '&userRol=' .$userRol);
    exit();
}

include 'db.php';
include 'conexion.php';

$sql = "SELECT COUNT(*) total FROM usuarios WHERE rol =1;";
$resultado = $mysqli->query($sql);
$fila = $resultado->fetch_assoc();

if ($fila['total'] > 1){
    
    $id = $_GET['id'];

    $sentencia = $bd->prepare("DELETE FROM usuarios WHERE id = ?;" );
    $resultado = $sentencia->execute([$id]);
    
    if ($resultado === TRUE) {
    
        header ('Location: home.php?mensaje=eliminado&userDni=' .$userDni. '&userRol=' .$userRol);
        
    } else {
        
        header ('Location: home.php?mensaje=error&userDni=' .$userDni. '&userRol=' .$userRol);
    
    }

}else{

    header ('Location: home.php?mensaje=noBorrar&userDni=' .$userDni. '&userRol=' .$userRol);

}

?>