<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\TagsModel;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = TagsModel::all();
        return view('admin.product.tags.index', compact('tags'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags_models,name',
        ]);

        TagsModel::create($request->all());

        return redirect()->route('tags.index')->with('success', 'Тег успешно добавлен');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = TagsModel::findOrFail($id);
        $tags = TagsModel::all();
        return view('admin.product.tags.index', compact('tag', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = TagsModel::findOrFail($id);
        $tags = TagsModel::all();
        return view('admin.product.tags.index', compact('edit', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags_models,name,' . $id,
        ]);

        $tag = TagsModel::findOrFail($id);

        $tag->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('tags.index')->with('success', 'Тег успешно обновлен');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = TagsModel::findOrFail($id);
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Тег успешно удален');
    }

}
