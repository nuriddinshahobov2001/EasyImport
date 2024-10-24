<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\AuthorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = AuthorModel::all();
        return view('admin.product.author.index', compact('authors'));

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
    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $authorName = $request->input('name');
            $sluggedName = Str::slug($authorName, '_');
            $fileName = $sluggedName . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('uploads/authors', $fileName);
            AuthorModel::create([
                'name' => $authorName,
                'photo' => $filePath,
                'description' => $request->description ?? null
            ]);
        } else {
            AuthorModel::create([
                'name' => $request->name,
                'photo' => 'uploads/authors/default.png',
                'description' => $request->description ?? null
            ]);
        }
        return back()->with(['success' => 'Автор успешно сохранен']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $authors = AuthorModel::all();
        $author = AuthorModel::findOrFail($id);
        return view('admin.product.author.index', compact('authors', 'author'));
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
