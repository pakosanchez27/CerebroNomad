<?php

namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class TestFilter extends ApiFilter
{
    // Propiedades para almacenar los parámetros seguros, mapeos de columnas y operadores
    protected $safeParams = [
        'name' => ['eq', 'like'],
        'price' => ['eq', 'lt', 'gt'],
    ];
    protected $columnMap = [];
    protected $operationMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'like' => 'like',
    ];

}

?>
