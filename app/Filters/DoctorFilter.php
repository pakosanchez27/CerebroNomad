<?php

namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class DoctorFilter extends ApiFilter
{
    // Propiedades para almacenar los parámetros seguros, mapeos de columnas y operadores

    // Lista de parámetros seguros y los operadores permitidos para cada uno
    protected $safeParams = [
        'id' => ['eq', 'gt', 'lt', 'gte', 'lte', 'ne'],
        'name' => ['eq'],
        'paterno' => ['eq'],
        'materno' => ['eq'],
        'sexo' => ['eq'],
        'email' => ['eq'],
        'telefono' => ['eq'],
        'especialidad' => ['eq'],
        'cedula' => ['eq'],
        'clinica' => ['eq'],
    ];

    // Mapeo de nombres de parámetros a nombres de columnas de la base de datos
    protected $columnMap = [
        'paterno' => 'apellido_paterno',
        'materno' => 'apellido_materno',
        'clinica' => 'nombre_clinica',
    ];

    // Mapeo de operadores a sus equivalentes en SQL
    protected $operationMap = [
        'eq' => '=', // Operador de igualdad
        'gt' => '>', // Operador mayor que
        'lt' => '<', // Operador menor que
        'gte' => '>=', // Operador mayor o igual que
        'lte' => '<=', // Operador menor o igual que
        'ne' => '!=', // Operador de desigualdad
    ];
}


?>
