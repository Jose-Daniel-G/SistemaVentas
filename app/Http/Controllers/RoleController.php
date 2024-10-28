<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {  // $datos = $request->all(); return response()->json($datos);
        $request->validate([
            'name' => 'required|unique:roles',
        ]);

        $rol = new Role();

        $rol->name = $request->name;
        $rol->guard_name = "web";
        $rol->save();

        return redirect()->route('admin.roles.index')
            ->with('icon', 'success')
            ->with('message', 'Se registro el rol correctamente')
            ->with('success', 'Se registro el rol correctamente');
    }

    public function show($id)
    {
        $role = Role::find($id);
        // dd($role);

        return view('admin.roles.show', compact('role'));
    }

    public function edit($id)
    {
        $role = Role::find($id); // Recupera el rol específico
        // dd($role);
        return view('admin.roles.edit', compact('role'));
    }
    
    public function update(Request $request,$id)
    {
        $request->validate(['name' => 'required|unique:roles,name,'.$id]);
        $role = Role::find($id);
        $role->name = $request->name;
        $role->guard_name = "web";
        $role->save();

        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    // public function destroy(Role $role)
    public function destroy($id)
    {   //return response()->json($id);
        Role::destroy($id);
        return redirect()->route('admin.roles.index')
            ->with('icon', 'success')
            ->with('message', 'Correctamente')
            ->with('success', 'Se elimino');
    }
}
