<?php
    //Configuramos los atrivutos necesarios de la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "parcial2";

    $error;
    //Establecemos una conexion a Mysql y la almacenamos en una variable
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Chequeamos la conexion
    if ($conn->connect_error) {
        $error = die("Conexion fallida: " . $conn->connect_error);
        echo json_encode($error);
    }

    //Capturamos las variables que se evian del formulario
    $area = $_POST["area"];
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $cantidad = $_POST["cantidad"];
    $fecha = $_POST["fecha"];
    $tipo = $_POST["tipo"];
    $pais = $_POST["paises"];

    //Validamos la selección y insertamos en su respectiva tabla
    if ($area === "ferreteria") {
        $sql = "INSERT INTO ferreteria (Cod_art, Nombre, Cantidad, Fecha, Importado, Pais)
        VALUES ('$codigo', '$nombre', '$cantidad', '$fecha', '$tipo', '$pais')";

    } elseif ($area === "jugueteria") {
        $sql = "INSERT INTO jugueteria (Cod_art, Nombre, Cantidad, Fecha, Importado, Pais)
        VALUES ('$codigo', '$nombre', '$cantidad', '$fecha', '$tipo', '$pais')";

    } elseif ($area === "deportes") {
        $sql = "INSERT INTO deportes (Cod_art, Nombre, Cantidad, Fecha, Importado, Pais)
        VALUES ('$codigo', '$nombre', '$cantidad', '$fecha', '$tipo', '$pais')";

    } elseif ($area === "ceramica") {
        $sql = "INSERT INTO ceramica (Cod_art, Nombre, Cantidad, Fecha, Importado, Pais)
        VALUES ('$codigo', '$nombre', '$cantidad', '$fecha', '$tipo', '$pais')";
        
    } elseif ($area === "confeccion") {
        $sql = "INSERT INTO confeccion (Cod_art, Nombre, Cantidad, Fecha, Importado, Pais)
        VALUES ('$codigo', '$nombre', '$cantidad', '$fecha', '$tipo', '$pais')";
        
    } elseif ($area === "oficina") {
        $sql = "INSERT INTO oficina (Cod_art, Nombre, Cantidad, Fecha, Importado, Pais)
        VALUES ('$codigo', '$nombre', '$cantidad', '$fecha', '$tipo', '$pais')";
        
    }
    
    //Mandamos un mensaje de confirmación o error
    if ($conn->query($sql) === TRUE) {
        $error = "Producto añadido satisfactoriamente";
        echo json_encode($error);
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
        echo json_encode($error);
    }

    //Cerramos la conecxion de la DB
    $conn->close();
?>