<?php

namespace App\Filters;
use Illuminate\Http\Request;

class ApiFilter
{
    // Propiedades para almacenar los parámetros seguros, mapeos de columnas y operadores
    protected $safeParams = [];
    protected $columnMap = [];
    protected $operationMap = [];

    // Método para transformar los parámetros de la solicitud en una estructura de consulta filtrada
    public function transform(Request $request){
        // Array para almacenar las partes de la consulta filtrada
        $eloQuery = [];

        // Iterar sobre los parámetros seguros definidos
        foreach($this->safeParams as $param => $operators){
            // Obtener el valor del parámetro de la solicitud
            $query = $request->query($param);

            // Si el valor del parámetro es nulo, continuar con el siguiente parámetro
            if(is_null($query)){
                continue;
            }

            // Obtener el nombre de la columna asociada al parámetro
            // Si no hay mapeo específico, usar el mismo nombre del parámetro
            $column = $this->columnMap[$param] ?? $param;

            // Iterar sobre los operadores asociados al parámetro
            foreach($operators as $operator){
                // Verificar si el operador está presente en la solicitud
                if(isset($query[$operator])){
                    // Agregar la parte de la consulta filtrada al array $eloQuery
                    // Contiene el nombre de la columna, el operador y el valor del operador
                    $eloQuery[] = [$column, $this->operationMap[$operator], $query[$operator]];
                }
            }
        }

        // Devolver la consulta filtrada
        return $eloQuery;
    }
}

?>
