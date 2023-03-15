<?php
// Incrusta Documentos
include('./db.php');
$con = connection();

if (isset($_GET['id'])  && is_numeric($_GET['id'])) {

  # Obtiene Valores...
  $id = $_GET['id'];

  // Insertion Sql
  try {
    $stmt = $con->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->execute(['id' => $id]);

    echo "Registro eliminado correctamente.";
  } catch (PDOException $e) {
    echo "Error Eliminar" . $e->getMessage();
  } finally {
    $con = null;
  }

  // 💀 Variables Globales Ahora


  // 💀 Reenvianos a La Pagina X
  header('Location: index.php');
}



?>
