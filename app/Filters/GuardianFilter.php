<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;


class GuardianFilter extends ApiFilter
{

  // Propiedades para almacenar los parámetros seguros, mapeos de columnas y operadores
  protected $safeParams = [
    'name' => ['eq'],
    'paterno' => ['eq'],
    'materno' => ['eq'],
    'edad' => ['eq', 'gt', 'lt','gte','lte', 'ne'],
    'email' => ['eq'],
    'telefono' => ['eq'],
    'paretesco' => ['eq'],
    'patient' => ['eq'],
  ];
  protected $columnMap = [
    'paterno' => 'apellido_paterno',
    'materno' => 'apellido_materno',
    'patient' => 'patient_id'
  ];
  protected $operationMap = [
    'eq' => '=', // Operador de igualdad
    'gt' => '>', // Operador mayor que
    'lt' => '<', // Operador menor que
    'gte' => '>=', // Operador mayor o igual que
    'lte' => '<=', // Operador menor o igual que
    'ne' => '!=', // Operador de desigualdad
  ];


}
