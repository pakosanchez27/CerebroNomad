<?php

namespace App\Http\Controllers;

use App\Models\Patient;

use App\Http\Requests\StorePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($doctors_id)
    {
        if(!$doctors_id == 'all'){
            $patients = Patient::where('doctor_id', $doctors_id)->get();
        }else{
            $patients = Patient::all();
        }
        return response()->json(['data' => $patients], 200);
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
