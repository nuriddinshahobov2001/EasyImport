<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\AuthorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $authorName = $request->input('name');
        $description = $request->input('description');
        $defaultPhotoPath = 'uploads/authors/default.png';

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $file = $request->file('photo');
            $sluggedName = Str::slug($authorName, '_');
            $fileName = $sluggedName . '_' . time() . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('uploads/authors', $fileName, 'public');
        } else {
            // Если фото не загружено, используем фото по умолчанию
            $filePath = $defaultPhotoPath;
        }

        // Создаем запись автора в базе данных
        AuthorModel::create([
            'name' => $authorName,
            'photo' => $filePath,
            'description' => $description
        ]);

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
        $authors = AuthorModel::all();
        $edit = AuthorModel::findOrFail($id);
        return view('admin.product.author.index', compact('authors', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */

        public function update(Request $request, $id)
    {
        // Находим автора по ID
        $author = AuthorModel::findOrFail($id);

        // Получаем новые значения из запроса
        $authorName = $request->input('name', $author->name);
        $description = $request->input('description', $author->description);

        // Проверяем, загружено ли новое фото
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $file = $request->file('photo');

            // Генерируем уникальное имя файла
            $sluggedName = Str::slug($authorName, '_');
            $fileName = $sluggedName . '_' . time() . '.' . $file->getClientOriginalExtension();

            // Сохраняем новое фото и получаем его путь
            $filePath = $file->storeAs('uploads/authors', $fileName, 'public');

            // Удаляем старое фото, если оно не является фото по умолчанию
            if ($author->photo && $author->photo !== 'uploads/authors/default.png') {
                Storage::disk('public')->delete($author->photo);
            }
        } else {
            // Если фото не загружено, сохраняем старое фото
            $filePath = $author->photo;
        }

        // Обновляем информацию об авторе
        $author->update([
            'name' => $authorName,
            'photo' => $filePath,
            'description' => $description
        ]);

        return redirect()->route('author.index')->with(['success' => 'Информация об авторе успешно обновлена']);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = AuthorModel::findOrFail($id);
        if ($author->photo && $author->photo !== 'uploads/authors/default.png') {
            Storage::delete($author->photo);
        }
        $author->delete();
        return redirect()->route('author.index')->with('success', 'Автор успешно удален');
    }

}
