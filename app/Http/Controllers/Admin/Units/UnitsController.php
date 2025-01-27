<?php

namespace App\Http\Controllers\Admin\Units;

use App\Http\Controllers\Controller;
use App\Http\Requests\Units\StoreUnitsRequest;
use App\Http\Requests\Units\UpdateUnitsRequest;
use App\Models\Units\UnitsModel;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = UnitsModel::all();
        return view('admin.units.index', compact('units'));
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
    public function store(StoreUnitsRequest $request)
    {
        $data = $request->validated();
        $unit = new UnitsModel();
        $unit->fill($data);
        $unit->save();
        return redirect()->route('units.index')->with('success', 'Единица успешно сохранено');
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
        $unitsEdit = UnitsModel::findOrFail($id);
        $units = UnitsModel::all();
        return view('admin.units.index', compact('units', 'unitsEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitsRequest $request, string $id)
    {
        $data = $request->validated();
        $unit = UnitsModel::findOrFail($id);
        $unit->fill($data);
        $unit->save();
        return redirect()->route('units.index')->with('info', 'Единица успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
