<?php
function connection()
{


    $dsn = 'mysql:host=localhost;dbname=db_registros';
    $usuario = 'root';
    $contraseña = 'admin';

    $opciones = [
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];

    try {

        $conexion = new PDO($dsn, $usuario, $contraseña, $opciones);
        $conexion->query("set names utf8;");

        return $conexion;
    } catch (PDOException $e) {

        echo 'Error DB: ' . $e->getMessage();
    }
}

// $conexion = connection();
// $conexion = null;
