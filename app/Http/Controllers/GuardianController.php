<?php

namespace App\Http\Controllers;

use App\Filters\GuardianFilter;
use App\Models\Guardian;
use App\Http\Resources\GuardianCollection;
use App\Http\Requests\StoreGuardianRequest;
use App\Http\Requests\UpdateGuardianRequest;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new GuardianFilter;
        $queryItems = $filter->transform($request);

        // Verificar si hay criterios de filtrado Familiar o tutores
        if (!empty($queryItems)) {
            // Aplicar los criterios de filtrado a la consulta de pacientes
            $patients = Guardian::where($queryItems);
        } else {
            // Si no hay criterios de filtrado, obtener todos los pacientes
            $patients = Guardian::query();
        }

        // Paginar los resultados y añadir los parámetros de la solicitud
        return new GuardianCollection($patients->with('Patient')->paginate(10)->appends($request->query()));
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
    public function store(StoreGuardianRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Guardian $guardian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guardian $guardian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuardianRequest $request, Guardian $guardian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guardian $guardian)
    {
        //
    }
}
