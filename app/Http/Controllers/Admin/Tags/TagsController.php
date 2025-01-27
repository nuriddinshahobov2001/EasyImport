<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\StoreTagsRequest;
use App\Http\Requests\Tags\UpdateTagsRequest;
use App\Models\Tags\TagsModel;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = TagsModel::all();
        return view('admin.tags.index', compact('tags'));
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
    public function store(StoreTagsRequest $request)
    {
        $data = $request->validated();
        $tag = new TagsModel();
        $tag->fill($data);
        $tag->save();
        return redirect()->route('tag.index')->with('success', 'Тег успешно сохранен');
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
        $tagsEdit = TagsModel::findOrFail($id);
        $tags = TagsModel::all();
        return view('admin.tags.index', compact('tagsEdit', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagsRequest $request, string $id)
    {
        $data = $request->validated();
        $tag = TagsModel::findOrFail($id);
        $tag->fill($data);
        $tag->save();
        return redirect()->route('tag.index')->with('info', 'Тег успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = TagsModel::findOrFail($id);
        if (is_null($tag)) {
            return redirect()->route('tag.index')->with('error', 'Тег не найден');
        }
        $tag->delete();
        return redirect()->route('tag.index')->with('success', 'Тег успешно удалено');
    }
}
