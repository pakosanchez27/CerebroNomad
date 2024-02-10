<?php

namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;


class AddressFilter extends ApiFilter {

    protected $safeParams = [
        'calle' => ['eq'],
        'numero' => ['eq'],
        'colonia'=> ['eq'],
        'ciudad'=> ['eq'],
        'estado'=> ['eq'],
        'codigoPostal' => ['eq'],
        'pais'=> ['eq', 'ne'],
        'pacient'=> ['eq', 'ne'],
    ];

    protected $columnMap = [
        'codigoPostal' => 'codigo_postal',
        'pacient' => 'pacient_id'
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