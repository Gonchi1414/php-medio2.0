<?php
    require_once 'conexion.php';
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header("Location: index.php");
        exit();
    }
    $id = (int)$_GET['id'];
    $sql = "DELETE FROM articulos WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    if ($stmt->execute([':id' => $id])) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar el artículo.";
    }
?>