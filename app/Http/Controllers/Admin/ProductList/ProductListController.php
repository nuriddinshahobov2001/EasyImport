<?php

namespace App\Http\Controllers\Admin\ProductList;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductList\StoreProductListRequest;
use App\Http\Requests\ProductList\UpdateProductListRequest;
use App\Models\Models\ProductList\ProductListModel;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prods = ProductListModel::all();
        return view('admin.productlist.index', compact('prods'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductListRequest $request)
    {
        $data = $request->validated();
        $prod = new ProductListModel();
        $prod->fill($data);
        $prod->save();
        return redirect()->route('products.index')->with('success', 'Продукт успешно сохранен');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prods = ProductListModel::all();
        $prodsEdit = ProductListModel::findOrFail($id);
        return view('admin.productlist.index', compact('prods', 'prodsEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductListRequest $request, string $id)
    {
        $data = $request->validated();
        $prod = ProductListModel::findOrFail($id);
        $prod->fill($data);
        $prod->save();
        return redirect()->route('products.index')->with('info', 'Продукт успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
