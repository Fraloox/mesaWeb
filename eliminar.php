<?php

session_start();


if(!isset($_GET['id'])){
    header ('Location: home.php?mensaje=error');
    exit();
}

if(isset($_SESSION['user_id'])){

    $user_id = $_SESSION['user_id'];

}

include 'db.php';
include 'conexion.php';

if($_GET['rol'] == 1 ){

    $sentencia = $bd->prepare('SELECT * FROM usuarios WHERE rol = :rol');

    $sentencia->bindParam(':rol', $_GET['rol']);

    $sentencia->execute();

    $fila = $sentencia->rowCount();

    if($fila == 1){

        header ('Location: home.php?mensaje=noAlterar&pagina=1');
        exit();

    }
}
   

$id = $_GET['id'];

$sentencia = $bd->prepare("DELETE FROM usuarios WHERE id = ?;" );
$resultado = $sentencia->execute([$id]);
    
if ($resultado === TRUE) {

    if($user_id == $id){

        header('Location: logout.php');
        exit();

    }else{

        header ('Location: home.php?mensaje=eliminado');
        exit();

    }
    
    
        
} else {
        
    header ('Location: home.php?mensaje=error');
    exit();
    
}

?>