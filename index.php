<?php
require_once 'utilidades.php';
require_once 'poo.php';
/**
 * primera parte: funciones utilitarias comunes
 * @var mixed
 */
$datos_sucios_xss = "<script>console.log(\"Ataque XSS\")</script><p>Hola Mundo</p>";
$fecha_hoy = date("Y-m-d H:i:s");
$fecha_hace_horas = date("Y-m-d H:i:s", strtotime("-3 hours"));
$fecha_hace_dias = date("Y-m-d H:i:s", strtotime("-5 days"));
$monto = 12450.75;
$titulo_articulo = "Introduccion a programacion con PHP!!!!";
/**
 * segunda parte: programación orientada a objetos
 */
/**Ejercicio 1 */
$calculadora = new Calculadora(10);
$resultado = $calculadora->sumar(5)->multiplicar(2)->restar(4)->dividir(3)->obtenerResultado();
/**Ejercicio 2 */
$empleado1 = new Empleado("Juan Perez", 3000);
$gerente1 = new Gerente("Maria Gomez", 5000, 1000);
/**Ejercicio 3 */
$cuenta = new CuentaBancaria("Juan Perez", 1000);
$cuenta->depositar(250);
$cuenta->retirar(100);
$cuenta->retirar(2000); // Intento de retiro que excede el saldo
$cuenta->depositar(50);
$historial_cuenta = $cuenta->getHistorialTransacciones();
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
        <div class="function-demo">
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
        </div>
        <!-- Segunda funcion -->
        <div class="function-demo">
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
        </div>
        <!-- tercer funcion -->
        <div class="function-demo">
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
        </div>
        <!-- cuarta funcion -->
        <div class="function-demo">
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
        </div>
        <!-- quinta funcion -->
        <div class="function-demo">
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
        </div>
        <h2>Parte 2: Programación Orientada a Objetos POO</h2>
        <!-- Ejercicio con poo 1 -->
        <div class="function-demo">
            <h4>Calculadora</h4>
            <p>Clases queque mantienen un resultado interno y permite encadenamiento de métodos.</p>
            <div class="code-box">
                asi se usa:
                echo $resultado = $calculadora->sumar(5)->multiplicar(2)->restar(4)->dividir(3)->obtenerResultado();
            </div>
            <div class="reult-box">
                <p><strong>Resultado Final:</strong> <?php echo $resultado; ?></p>
            </div>
        </div>
        <!-- Ejercicio con poo 2 -->
        <div class="function-demo">
            <h4>Herencia y Polimorfismo </h4>
            <p>Empleados y Gerentes</p>
            <div class="code-box">
                asi se usa:
                $empleado1 = new Empleado("Juan Perez", 3000);
                $gerente1 = new Gerente("Maria Gomez", 5000, 1000);
            </div>
            <div class="reult-box">
                <p><strong>Detalles del Empleado:</strong> <?php echo $empleado1->obtenerDetalles(); ?></p>
                <p><strong>Detalles del Gerente:</strong> <?php echo $gerente1->obtenerDetalles(); ?></p>
            </div>
        </div>
        <!-- Ejercicio con poo 3 -->
        <div class="function-demo">
            <h4>Cuentas Bancarias(Encapsulacion e Historial) </h4>
            <p>Uso de propiedades e historial interno de transacciones</p>
            <div class="code-box">
                asi se usa:<br>
                $cuenta = new CuentaBancaria("Juan Perez", 1000);<br>
                $cuenta->depositar(250);<br>
                $cuenta->retirar(100);<br>
                $cuenta->retirar(2000); // Intento de retiro que excede el saldo<br>
                $cuenta->depositar(50);<br>
                $historial_cuenta = $cuenta->getHistorialTransacciones();<br>
            </div>
            <div class="reult-box">
                <p><strong>Titular:</strong> <?php echo $cuenta->getTitular(); ?></p>
                <p><strong>Saldo Actual:</strong> <?php echo $cuenta->getSaldo(); ?></p>
                <p><strong>Historial de Transacciones:</strong></p>
                <table class="historial-tabla">
                    <tr>
                        <th>Tipo</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Saldo Restante</th>
                    </tr>
                    <?php foreach ($historial_cuenta as $transaccion) : ?>
                        <tr>
                            <td><?php echo $transaccion['tipo']; ?></td>
                            <td><?php echo formatear_moneda($transaccion['monto']); ?></td>
                            <td><?php echo formatear_fecha($transaccion['fecha']); ?></td>
                            <td><?php echo formatear_moneda($transaccion['saldo_restante']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>