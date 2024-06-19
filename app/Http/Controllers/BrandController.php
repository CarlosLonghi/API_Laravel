<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Services\BrandServices;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function __construct(protected BrandServices $brandServices)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = $this->brandServices->list();
        return response()->json($brands);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
