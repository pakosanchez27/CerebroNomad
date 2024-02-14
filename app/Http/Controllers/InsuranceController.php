<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Http\Resources\InsuranceResource;
use App\Http\Resources\InsuranceCollection;
use App\Http\Requests\StoreInsuranceRequest;
use App\Http\Requests\UpdateInsuranceRequest;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insurances = Insurance::all();
        return new InsuranceCollection($insurances);

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
    public function store(StoreInsuranceRequest $request)
    {
        //
        return new InsuranceResource(Insurance::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Insurance $insurance)
    {
        //
        return new InsuranceResource($insurance);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insurance $insurance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInsuranceRequest $request, Insurance $insurance)
    {
        //
        $insurance->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insurance $insurance)
    {
        //
        $insurance->delete();
    }
}
