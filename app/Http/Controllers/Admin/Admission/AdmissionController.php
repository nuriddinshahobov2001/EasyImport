<?php

namespace App\Http\Controllers\Admin\Admission;

use App\Http\Controllers\Controller;
use App\Models\Models\ProductList\ProductListModel;
use App\Models\Units\UnitsModel;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.admission.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = ProductListModel::all();
        $units = UnitsModel::all();
        return view('admin.admission.create', compact('products', 'units'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
