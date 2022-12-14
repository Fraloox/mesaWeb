<?php
    
    include_once 'conexion.php';
    include 'db.php';

    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $telefono = $_POST["txtTelefono"];
    $dni = $_POST["txtDni"];
    $email = $_POST["txtEmail"];
    $direccion = $_POST["txtDireccion"];

    $sql = "SELECT COUNT(*) total FROM clientes WHERE dni = '$dni';";
    $resultado = $mysqli->query($sql);
    $fila = $resultado->fetch_assoc();

    if($fila['total'] == 1){

        header ('Location: home-clientes.php?mensaje=clienteRepetido&pagina=1');
        exit();

    }else{

        $sentencia = $bd->prepare(
            "INSERT INTO clientes(nombre, apellido, telefono, dni, email, direccion)
            VALUES (?,?,?,?,?,?);");
        
        $resultado = $sentencia->execute([$nombre,$apellido,$telefono,$dni,$email, $direccion]);
    
    
        if($resultado === TRUE){
    
            header('Location: home-clientes.php?mensaje=registrado&pagina=1');
            exit();

        }else{

            header('Location: home-clientes.php?mensaje=error&pagina=1');
            exit();
    
        }

    }

?>