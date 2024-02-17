<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Filters\TestFilter;
use Illuminate\Http\Request;
use App\Http\Resources\TestCollection;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Http\Resources\TestResource;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new TestFilter();
        $queryItems = $filter->transform($request);

        // Verificar si hay criterios de filtrado presentes
        if (!empty($queryItems)) {
            $test = Test::where($queryItems);
        } else {
            $test = Test::query();
        }

        return new TestCollection($test->paginate(10)->appends($request->query()));
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
    public function store(StoreTestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        return new TestResource($test);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestRequest $request, Test $test)
    {
        $test->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        $test->delete();
    }
}
