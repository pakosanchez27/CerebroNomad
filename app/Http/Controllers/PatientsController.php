<?php

namespace App\Http\Controllers;

use App\Models\Patient;

use App\Filters\PatientsFilter;
use App\Http\Resources\PatientCollection;
use App\Http\Requests\StorePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;
use Illuminate\Http\Request;


class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new PatientsFilter();
        $queryItems = $filter->transform($request);
        
        // Verificar si hay criterios de filtrado presentes
        if (!empty($queryItems)) {
            // Aplicar los criterios de filtrado a la consulta de pacientes
            $patients = Patient::where($queryItems);
        } else {
            // Si no hay criterios de filtrado, obtener todos los pacientes
            $patients = Patient::query();
        }
        
        // Paginar los resultados y añadir los parámetros de la solicitud
        return new PatientCollection($patients->paginate(10)->appends($request->query()));
    }
    



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientsRequest $request, Patient $patients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patients)
    {
        //
    }
}
