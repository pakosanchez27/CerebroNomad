<?php

namespace App\Http\Controllers;

use App\Filters\GuardianFilter;
use App\Models\Guardian;
use App\Http\Resources\GuardianCollection;
use App\Http\Requests\StoreGuardianRequest;
use App\Http\Requests\UpdateGuardianRequest;
use App\Http\Resources\GuardianResource;
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
            $guardianQuery = Guardian::where($queryItems);
        } else {
            // Si no hay criterios de filtrado, obtener todos los pacientes
            $guardianQuery = Guardian::query();
        }

        // Cargar la relación 'patient' en la consulta antes de la paginación
        $guardian = $guardianQuery->with('Patient')->paginate(10);
        // Paginar los resultados y añadir los parámetros de la solicitud
        return new GuardianCollection($guardian->appends($request->query()));
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
        return new GuardianResource(Guardian::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Guardian $guardian)
    {
        //
        $guardian->load('Patient');
        return new GuardianResource($guardian);
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
        $guardian->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guardian $guardian)
    {
        //
        $guardian->delete();
    }
}
