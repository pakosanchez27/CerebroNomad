<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Filters\DoctorFilter;
use App\Http\Resources\DoctorCollection;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Instancia de la clase del filtro
        $filter = new DoctorFilter();
        // Transformar la solicitud en criterios de filtrado
        $queryItems = $filter->transform($request);

        // Verificar si hay criterios de filtrado presentes
        if (!empty($queryItems)) {
            // Aplicar los criterios de filtrado a la consulta de doctores
            $doctors = Doctor::where($queryItems);
        } else {
            // Si no hay criterios de filtrado, obtener todos los doctores
            $doctors = Doctor::query();
        }

        // Paginar los resultados y añadir los parámetros de la solicitud
        return new DoctorCollection($doctors->paginate(10)->appends($request->query()));
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
    public function store(StoreDoctorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
