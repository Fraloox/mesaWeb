<?php
    include_once 'conexion.php';
    include 'db.php';

    $nombre = $_POST["txtNombre"];
    $cantidad = $_POST["txtCantidad"];
    $marca = $_POST["txtMarca"];
    $precio = $_POST["txtPrecio"];
    $descripcion = $_POST["txtDescripcion"];

    $sql = "SELECT COUNT(*) total FROM productos WHERE nombre = '$nombre';";
    $resultado = $mysqli->query($sql);
    $fila = $resultado->fetch_assoc();

    if($fila['total'] == 1){

        header ('Location: home-productos.php?mensaje=productoRepetido&pagina=1');
        exit();

    }else{

        $sentencia = $bd->prepare(
            "INSERT INTO productos(nombre, cantidad, marca, descripcion, precio)
            VALUES (?,?,?,?,?);");
        
        $resultado = $sentencia->execute([$nombre,$cantidad,$marca,$descripcion,$precio]);
    
    
        if($resultado === TRUE){
    
            header('Location: home-productos.php?mensaje=registrado&pagina=1');
            exit();

        }else{

            header('Location: home-productos.php?mensaje=error&pagina=1');
            exit();
    
        }

    }
    
?>