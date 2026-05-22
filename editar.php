<?php
require_once 'conexion.php';
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit();
}
$id = $_GET["id"];
//obtener el id del articulo a editar
$sql = "SELECT * FROM articulos WHERE id = :id";
$stmt = $conexion->prepare($sql);
$stmt->execute([':id' => $id]);
$articulo = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$articulo) {
    header("Location: index.php");
    exit();
}

//procesar el formulario de edición por post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $sql = "UPDATE articulos SET titulo = :titulo, contenido = :contenido WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    if ($stmt->execute([':titulo' => $titulo, ':contenido' => $contenido, ':id' => $id])) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar el artículo.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Articulo</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <header>Editar Articulo</header>
        <form action="editar.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="<?php echo $articulo['titulo']?>" required >
            </div>
            <div class="form-group">
                <label for="contenido">Contenido:</label>
                <textarea id="contenido" name="contenido" class="form-control" rows="5" required><?php echo $articulo['contenido']?></textarea>
            </div>
            <button type="submit" class="btn btn-sucess">Guardar cambios</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

</body>

</html>