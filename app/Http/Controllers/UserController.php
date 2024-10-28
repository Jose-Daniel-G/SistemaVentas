<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {   $empresa_id = Auth::user()->empresa_id;
        $users = User::where('empresa_id', $empresa_id)->get()  ;
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles =Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'name' => 'required|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|max:250|confirmed',   
        ]);

                
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->empresa_id =  Auth::user()->empresa_id;
        $user->save();

        // $user->assignRole("admin");
        return redirect()->route('admin.usuarios.index')
            ->with('info','Se registro al usuario de forma correcta')
            ->with('icono','success');
    }

    public function show($id)
    {
        $user = User::find($id);
       
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {$user = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|max:255|unique:users,email,'.$user->id,
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->empresa_id =  Auth::user()->empresa_id;

        if ($request->filled('password')) {
            $user->password = Hash::make($request['password']); //bcrypt($request->input('password'));
        }
        $user->save();
    
        return redirect()->route('admin.users.index')->with('info', 'Usuario actualizado exitosamente')
                                                        ->with('icono','success');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users.index')
            ->with('icon', 'success')
            ->with('message', 'Correctamente')
            ->with('success', 'Se elimino');
    }
}
