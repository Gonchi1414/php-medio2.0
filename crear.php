<?php
require_once 'conexion.php';
require_once 'utilidades.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $sql = "INSERT INTO articulos (titulo, contenido) VALUES (:titulo, :contenido)";
    // $sql = "INSERT INTO articulos (titulo, contenido) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql);
    // if ($stmt->execute([$titulo, $contenido])) {
    if ($stmt->execute([':titulo' => $titulo, ':contenido' => $contenido])) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al crear el artículo.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Articulo</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <header>Crear Nuevo Articulo</header>
        <form action="crear.php" method="post">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contenido">Contenido:</label>
                <textarea id="contenido" name="contenido" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-sucess">Crear Articulo</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

</body>

</html>