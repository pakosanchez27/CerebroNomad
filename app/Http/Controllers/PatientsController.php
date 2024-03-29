<?php

namespace App\Http\Controllers;

use App\Models\Patient;

use Illuminate\Http\Request;
use App\Filters\PatientsFilter;
use App\Http\Resources\PatientResource;
use App\Http\Resources\PatientCollection;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;



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
        return new PatientCollection($patients->with('Doctor', 'Insurance', 'Address', 'Guardian')->paginate(10)->appends($request->query()));
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
    public function store(StorePatientRequest $request)
    {
        //
        return new PatientResource(Patient::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        // Cargar las relaciones necesarias
        $patient->load('doctor', 'insurance', 'address', 'guardian');

        // Pasar el modelo cargado a PatientResource
        return new PatientResource($patient);
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
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $patient->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patients)
    {
        //
    }
}
