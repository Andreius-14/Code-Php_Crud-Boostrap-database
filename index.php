<!--🟥🟥🟥 PHP 🟥🟥🟥-->

<?php

include("db.php");
$con = connection();

$stmt = $con->query("SELECT * FROM usuarios");
$query = $stmt->fetchAll();

?>


<?php /*🌱🌱🌱*/
$pageNombre = "Usuarios";
include("./include/header.php");
?>

<div class="container-lg mt-4 ">


    <div class="row">

        <!-- 💀 Zona 1 -->
        <div class="col">
            <form action="/create.php" method="post" class="m-3">

                <div class="mb-3">
                    <label for="formName" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="formName" name="nombre" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="formApellido" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="apellido" id="forApellido">
                </div>

                <div class="mb-3">
                    <label for="formEdad" class="form-label">Edad</label>
                    <input type="number" class="form-control" name="edad" id="forEdad">
                </div>


                <button type="submit" class="btn btn-primary" name="insertar">Submit</button>
            </form>
        </div>


        <!-- 💀 Zona 2 -->
        <div class="col">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Edad</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query as $row) { ?>
                        <tr>
                            <th><?= $row->id ?></th>
                            <th><?= $row->nombres ?></th>
                            <th><?= $row->apellidos ?></th>
                            <th><?= $row->edad ?></th>
                            <th><a href="edit.php?id=<?= $row->id ?>" class="btn btn-primary btn-sm">Editar</a></th>
                            <th><a href="delete.php?id=<?= $row->id ?>" class="btn btn-danger btn-sm">Eliminar</a></th>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>


    </div>
</div>


<?php /*🌱🌱🌱*/ include("./include/footer.php"); ?>