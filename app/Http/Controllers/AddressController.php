<?php

namespace App\Http\Controllers;

use App\Filters\AddressFilter;
use App\Models\Address;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Resources\AddressCollection;
use Illuminate\Http\Request;

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
        return new AddressCollection($address->with('Patient')->paginate(10)->appends($request->query()));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //
    }
}
