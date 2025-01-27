<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            Category::create($request->validated());
            return redirect()->route('category.index')->with('success', 'Категория успешно добавлена');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ошибка при добавлении категории: ' . $e->getMessage());
        }
    }

    public function show($id){
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoryEdit = Category::findOrFail($id);
        $categories = Category::all();
        return view('admin.category.index', compact('categoryEdit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        try {
            $data = $request->validated();
            $category = Category::findOrFail($id);
            $category->update($data);
            return redirect()->route('category.index')->with('info', 'Категория успешно обновлена');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ошибка при обновлении категории: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Категория успешно удалена');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ошибка при удалении категории: ' . $e->getMessage());
        }
    }
}
