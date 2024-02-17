<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Filters\AddressFilter;
use App\Http\Resources\AddressResource;
use App\Http\Resources\AddressCollection;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new AddressFilter();
        $queryItems = $filter->transform($request);

        // Verificar si hay criterios de filtrado direcciones
        if (!empty($queryItems)) {
            // Aplicar los criterios de filtrado a la consulta de direcciones
            $address = Address::where($queryItems);
        } else {
            // Si no hay criterios de filtrado, obtener todos los direcciones
            $address = Address::query();
        }

        // Paginar los resultados y añadir los parámetros de la solicitud
        return new AddressCollection($address->with('patient')->paginate(10)->appends($request->query()));
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
    public function store(StoreAddressRequest $request)
    {
        $address = Address::create($request->all());
        return new AddressResource($address);
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        return new AddressResource($address);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        $address->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //
    }
}
