<?php
include("./db.php");
$conexion = connection();
if (isset($_GET['id'])  && is_numeric($_GET['id'])) {

    #Obtiene Valores
    $id = $_GET['id'];
    #Inserta SQL
    $stmt = $conexion->query('SELECT * FROM usuarios WHERE id=' . $id);
    $query = $stmt->fetch();
}

if (isset($_POST['actualizar'])) {

    #Obtener Valores
    $id = $_GET['id'];

    $nombres = htmlspecialchars(trim($_POST['nombres']));
    $apellidos = htmlspecialchars(trim($_POST['apellidos']));
    $edad = htmlspecialchars(trim($_POST['edad']));

    #Inserta SQL
    $sentencia = $conexion->prepare("UPDATE usuarios set nombres=?, apellidos=?, edad=? WHERE id=?");
    $sentencia->bindParam(1, $nombres);
    $sentencia->bindParam(2, $apellidos);
    $sentencia->bindParam(3, $edad);
    $sentencia->bindParam(4, $id);
    $sentencia->execute();

    #Reenviamos Pagina
    header('Location: index.php');
    $conexion = null;
    exit();
}
?>

<?php
$pageNombre = "Editar";
include("./include/header.php");
?>

<div class="col">
    <form method="post" class="m-3">

        <div class="mb-3">
            <label for="formName" class="form-label">Nombres</label>
            <input value="<?= $query->nombres; ?>" type="text" class="form-control" id="formName" name="nombres" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="formApellido" class="form-label">Apellidos</label>
            <input value="<?= $query->apellidos; ?>" type="text" class="form-control" name="apellidos" id="forApellido">
        </div>

        <div class="mb-3">
            <label for="formEdad" class="form-label">Edad</label>
            <input value="<?= $query->edad; ?>" type="number" class="form-control" name="edad" id="forEdad">
        </div>


        <button type="submit" class="btn btn-primary" name="actualizar">Submit</button>
    </form>
</div>

<?php
include("./include/footer.php")
?>