<?php
require_once 'utilidades.php';
$datos_sucios_xss = "<script>console.log(\"Ataque XSS\")</script><p>Hola Mundo</p>";
$fecha_hoy = date("Y-m-d H:i:s");
$fecha_hace_horas = date("Y-m-d H:i:s", strtotime("-3 hours"));
$fecha_hace_dias = date("Y-m-d H:i:s", strtotime("-5 days"));
$monto = 12450.75;
$titulo_articulo = "Introduccion a programacion con PHP!!!!";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Medio</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>PHP Medio</h1>
        </header>
        <h2>Lógica PHP Reutilizable</h2>
        <h3> Parte 1: Funciones utilitarias Comunes</h3>
        <!-- primera funcion  Sonitización de codigo-->
        <!-- <div class="function-demo">
            <h4>Función de Sanitización de Código</h4>
            <p>Esta función toma una cadena de entrada y la sanitiza para prevenir ataques de inyección de código. Es
                útil para limpiar datos antes de mostrarlos en una página web.</p>
            <div class="code-box">
                asi se usa:
                $limpio = sanitizar_entrada($datos_sucios_xss);
            </div>
            <div class="reult-box">
                <p><strong>Entrada Sucia:</strong> <?php echo $datos_sucios_xss; ?></p>
                <p><strong>Salida Sanitizada:</strong> <?php echo sanitizar_entrada($datos_sucios_xss); ?></p>
            </div>
        </div> -->
        <!-- Segunda funcion -->
         <!-- <div class="function-demo">
            <h4>Formatear fechas</h4>
            <p>Esta función toma una fecha del sistema y la muestra con el nombre del mes en español</p>
            <div class="code-box">
                asi se usa:
                $fecha_formateada = formatear_fecha($fecha_hoy );
            </div>
            <div class="reult-box">
                <p><strong>Fecha Actual:</strong> <?php echo $fecha_hoy; ?></p>
                <p><strong>Fecha Formateada:</strong> <?php echo formatear_fecha($fecha_hoy); ?></p>
            </div>
        </div> -->
        <!-- tercer funcion -->
         <!-- <div class="function-demo">
            <h4>Calculo de tiempo</h4>
            <p>Esta función  calcula el tiempor transcurrido de una fecha pasada hatas el momento actual</p>
            <div class="code-box">
                asi se usa:
                echo calcular_tiempo_hace($fecha_pasada);
            </div>
            <div class="reult-box">
                <p><strong>Calculo Fech Pasada:</strong> <?php echo calcular_tiempo_hace($fecha_hace_horas); ?></p>
                <p><strong>Calculo Fech Pasada (5 días):</strong> <?php echo calcular_tiempo_hace($fecha_hace_dias); ?></p>
            </div>
        </div> -->
        <!-- cuarta funcion -->
        <!-- <div class="function-demo">
            <h4>Esta funcion dara el formato de dinero a un numero de decimal simple</h4>
            <p>Esta función  calcula el tiempor transcurrido de una fecha pasada hatas el momento actual</p>
            <div class="code-box">
                asi se usa:
                echo formatear_moneda(12450.75);
            </div>
            <div class="reult-box">
                <p><strong>Entrada:</strong> <?php echo $monto; ?></p>
                <p><strong>Salida Formateada:</strong> <?php echo formatear_moneda($monto); ?></p>
            </div>
        </div> -->
        <!-- quinta funcion -->
        <!-- <div class="function-demo">
            <h4>Limpiar texto para URL</h4>
            <p>Esta función Limpia un texto y lo prepara para poder usarlo de forma segura en un enlace o URL</p>
            <div class="code-box">
                asi se usa:
                echo generar_slug("Introduccion a programacion con PHP");
            </div>
            <div class="reult-box">
                <p><strong>Entrada:</strong> <?php echo $titulo_articulo; ?></p>
                <p><strong>Salida Formateada:</strong> <?php echo generar_slug($titulo_articulo); ?></p>
            </div>
        </div> -->

    </div>
</body>

</html>