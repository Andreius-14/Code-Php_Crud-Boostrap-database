<?php

/*🌱🌱*/ include("./db.php")
;



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insertar'])) {

    // SEGURIDAD - ⚠️ SQL INJECTION
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $apellido = htmlspecialchars(trim($_POST['apellido']));
    $edad = htmlspecialchars(trim($_POST['edad']));

    if (!empty($nombre) && !empty($apellido) && !empty($edad)) {
        try {
            $db = connection();
            $sentencia = $db->prepare("INSERT INTO usuarios(nombres,apellidos,edad) VALUES (?,?,?)");

            // SEGURIDAD - ⚠️ SQL INJECTION
            $sentencia->bindParam(1, $nombre);
            $sentencia->bindParam(2, $apellido);
            $sentencia->bindParam(3, $edad);
            $sentencia->execute();

            $db = null;
        } catch (PDOException $e) {
            //throw $th;
            echo 'Error Insertar: ' . $e->getMessage();
        }
    }
}
// redirigir a la página principal
header('Location: index.php');
exit();
