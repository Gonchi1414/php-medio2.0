<?php

// sanitizaion de entradas
function sanitizar_entrada($datos){
    $datos = trim($datos); //elimina espacios al inioc y a final
    return htmlspecialchars($datos); // convierte caracteres especiales en entidades HTML para prevenir ataques XSS
}
// dar formato fecha en español
function formatear_fecha($fecha){
    $timestamp = strtotime($fecha);
    $meses = array(
        1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
        5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
        9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
    );
    $dia = date('j', $timestamp);
    $mes = (int)date('n', $timestamp);
    $anio = date('Y', $timestamp);
    return "$dia de " . $meses[$mes] . " de $anio";
}
// calcular tiempo transcurrido
function calcular_tiempo_hace($fecha_pasada){
    $segundos = time() - strtotime($fecha_pasada);
    if ($segundos < 60) {
        return "Hace $segundos segundos";
    } elseif ($segundos < 3600) {
        $minutos = floor($segundos / 60);
        return "Hace $minutos minutos";
    } elseif ($segundos < 86400) {
        $horas = floor($segundos / 3600);
        return "Hace $horas horas";
    } else {
        $dias = floor($segundos / 86400);
        return "Hace $dias días";
    }
}
// formateo de moneda
function formatear_moneda($monto, $simbolo = 'Bs. '){
    return $simbolo . number_format($monto, 2, ',', '.');
}
// limpiar texto para URL (slug)
function generar_slug($texto){
    $texto = strtolower($texto);
    $texto = str_replace(' ', '_', $texto);
    $texto = preg_replace('/[^a-z0-9_]/', '', $texto);
    return $texto;
}
?>