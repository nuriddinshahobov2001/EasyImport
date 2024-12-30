<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
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
        if (Role::where('name', $request->name)->where('guard_name', 'web')->exists()) {
            return back()->with(['info' => 'Роль с таким именем уже существует.']);
        }
        Role::create($request->all());
        return redirect()->route('role.index')->with('success', 'Роль успешно создано.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $show  = Role::findOrFail($id);
        $roles = Role::all();
        return view('admin.roles.index', compact('show', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit  = Role::findOrFail($id);
        $roles = Role::all();
        return view('admin.roles.index', compact('edit', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $role = Role::findOrFail($id);
       $role->update($request->all());
        return redirect()->route('role.index')->with('success', 'Роль успешно изменено.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Найти роль по ID
            $role = Role::findOrFail($id);

            // Проверить, связана ли роль с пользователями
            if ($role->users()->count() > 0) {
                // Если есть пользователи, выбрасываем исключение или возвращаем ошибку
                return back()->withErrors(['error' => 'Невозможно удалить роль, так как с ней связаны пользователи.']);
            }

            // Если пользователей нет, можно удалить роль
            DB::beginTransaction();
            $role->delete();
            DB::commit();

            return back()->with('success', 'Роль успешно удалена.');
        } catch (ModelNotFoundException $e) {
            return back()->withErrors(['error' => 'Роль не найдена.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Произошла ошибка при удалении роли.']);
        }
    }
}
