<?php
 /**Ejercicios con poo */
 // ======================================
//  Ejercicio 1: Calculadora con POO
 // ======================================
 class Calculadora {
    private float $resultado;
    public function __construct( float $valorInicial = 0) {
        $this->resultado = $valorInicial;
    }
    public function sumar(float $valor): self {
        $this->resultado += $valor;
        return $this;
    }
    public function restar(float $valor): self {
        $this->resultado -= $valor;
        return $this;
    }
    public function multiplicar(float $valor): self {
        $this->resultado *= $valor;
        return $this;
    }
    public function dividir(float $valor): self {
        if ($valor != 0) {
            $this->resultado /= $valor;
        } else {
            throw new InvalidArgumentException("Syntax error.");
        }
        return $this;
    }
    public function obtenerResultado(): float {
        return $this->resultado;
    }
    public function reiniciar(): self {
        $this->resultado = 0;
        return $this;
    }
 }
 // ======================================
 // Ejercicio 2: Herencia y Polimorfismo
 // ======================================
class Empleado {
    protected string $nombre;
    protected float $salarioBase;
    public function __construct(string $nombre, float $salarioBase) {
        $this->nombre = $nombre;
        $this->salarioBase = $salarioBase;
    }
    public function getNombre(): string {
        return $this->nombre;
    }
    public function calcularSalario(): float {
        // logica del calculo del salario
        $salarioCalculado = $this->salarioBase - ($this->salarioBase * 0.11); // Ejemplo simple, sin bonificaciones ni descuentos
        return $salarioCalculado;
    }
    public function obtenerDetalles(): string {
        return "Empleado: <strong>{$this->nombre}</strong>, Salario Base: <strong>{$this->salarioBase}</strong>, Salario Calculado: <strong>{$this->calcularSalario()}</strong>";
    }
}
class Gerente extends Empleado {
    private float $bono;
    public function __construct(string $nombre, float $salarioBase, float $bono) {
        parent::__construct($nombre, $salarioBase);
        $this->bono = $bono;
    }
    public function calcularSalario(): float {
        // logica del calculo del salario con bono
        $salarioCalculado = parent::calcularSalario() + $this->bono; // Agrega el bono al salario calculado del empleado
        return $salarioCalculado;
    }
    public function obtenerDetalles(): string {
        return "Gerente: <strong>{$this->nombre}</strong>, Salario Base: <strong>{$this->salarioBase}</strong>, Bono: <strong>{$this->bono}</strong>, Salario Calculado: <strong>{$this->calcularSalario()}</strong>";
    }
}
 // ======================================
 // Ejercicio 3: Encapsulacion e Historial
 // ======================================
 class CuentaBancaria {
    private string $titular;
    private float $saldo;
    private array $historialTransacciones = [];
    public function __construct(string $titular, float $saldoInicial = 0) {
        $this->titular = $titular;
        if ($saldoInicial < 0) {
            $this->saldo = 0;
            $this->registraTransaccion('Apertura de cuenta Fallida (intento de saldo negativo)', 0);
        } else {
            $this->saldo = $saldoInicial;
            $this->registraTransaccion('Apertura de cuenta', $saldoInicial);
        }
    }
    public function getTitular(): string {
        return $this->titular;
    }
    public function getSaldo(): float {
        return $this->saldo;
    }
    public function getHistorialTransacciones(): array {
        return $this->historialTransacciones;
    }
    private function registraTransaccion(string $tipo, float $monto): void {
        $this->historialTransacciones[] = [
            'tipo' => $tipo,
            'monto' => $monto,
            'fecha' => date('Y-m-d H:i:s'),
            'saldo_restante' => $this->saldo
        ];
    }
    public function depositar(float $monto): bool {
        if ($monto <= 0){
            return false; // No se permiten depósitos de monto negativo o cero
        }
        $this->saldo += $monto;
        $this->registraTransaccion('Depósito', $monto);
        return true;
    }
    public function retirar(float $monto): bool {
        if ($monto <= 0 || $monto > $this->saldo) {
            $this->registraTransaccion('Intento de retiro fallido', $monto);
            return false; // No se permiten retiros de monto negativo, cero o mayor al saldo disponible
        }
        $this->saldo -= $monto;
        $this->registraTransaccion('Retiro exitoso', $monto);
        return true;
    }
 }
?>