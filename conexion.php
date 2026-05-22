<?php
$host ='localhost';
$dbname = 'pagi_php';
$usuario = 'falle';
$password = 'falle123';
if (file_exists(__DIR__ .'./.env')) {
    $lineas = file(__DIR__ .'./.env');
    foreach ($lineas as $linea){
        if (strpos(trim($linea), '#') === 0 || strpos(trim($linea), '=') === false) {
            continue; // Ignorar comentarios y líneas sin '='
        }
        list($clase, $valor) = explode('=', trim($linea), 2);
        $clase = trim($clase);
        $valor = trim(trim($valor), '"\"');
        if ($clase === 'DB_HOST') $host = $valor;
        if ($clase === 'DB_NAME') $dbname = $valor;
        if ($clase === 'DB_USER') $usuario = $valor;
        if ($clase === 'DB_PASS') $password = $valor;
    }
}
try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>