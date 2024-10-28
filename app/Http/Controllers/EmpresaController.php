<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $paises = DB::table('countries')->get();
        $estados = DB::table('states')->get();
        $ciudades = DB::table('cities')->get();
        $monedas = DB::table('currencies')->get();
        return view('admin.empresas.create', compact('paises', 'estados', 'ciudades', 'monedas'));
    }

    public function store(Request $request)
    {
        // 
        $request->validate([
            'nombre_empresa' => 'required',
            'tipo_empresa' => 'required',
            'ciudad' => 'required',
            'nit' => 'required|unique:empresas',
            'telefono' => 'required',
            'correo' => 'required|unique:empresas',
            'cantidad_impuesto' => 'required',
            'nombre_impuesto' => 'required',
            'direccion' => 'required',
            'logo' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        // dd($request->all());
        $empresa = new Empresa();

        $empresa->pais = $request->pais;
        $empresa->ciudad = $request->nombre_empresa;
        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->tipo_empresa = $request->tipo_empresa;
        $empresa->nit = $request->nit;
        $empresa->telefono = $request->telefono;
        $empresa->correo = $request->correo;
        $empresa->cantidad_impuesto = $request->cantidad_impuesto;
        $empresa->nombre_impuesto = $request->nombre_impuesto;
        $empresa->moneda = $request->moneda;
        $empresa->direccion = $request->direccion;
        $empresa->ciudad = $request->ciudad;
        $empresa->departamento = $request->select_estado;
        $empresa->codigo_postal = $request->codigo_postal;
        $empresa->logo = $request->file('logo')->store('logos', 'public');
        // dd($empresa);
        $empresa->save();
        // return  redirect()->back()
        $user = new User();
        $user->name = "Admin";
        $user->email = $request->correo;
        $user->password = Hash::make($request['nit']);
        $user->empresa_id = $empresa->id;
        $user->save();
        
        $user->assignRole("admin");

        Auth::login($user);
        return redirect()->route('admin.index')->with('success', 'Empresa y usuario administrador creados y logueados con éxito');
        // return  redirect()->route('admin.index')
        // ->with('icon', 'success')
        // ->with('message', 'Se registro el rol correctamente')
        // ->with('success', 'Se registro el rol correctamente');

    }

    public function show(Empresa $empresa)
    {
        // return view('admin.index');
    }

    public function edit(Empresa $empresa)
    {
        $paises = DB::table('countries')->get();
        $estados = DB::table('states')->get();
        // $ciudades = DB::table('cities')->get();
        $monedas = DB::table('currencies')->get();
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::where('id', $empresa_id)->first();
        $departamentos = DB::table('states')->where('country_id',$empresa->pais)->get();
        $ciudades = DB::table('cities')->where('state_id',$empresa->departamento)->get();

        // $empresa = Empresa::findOrFail($empresa_id); // Aquí se usa el ID pasado en la URL

        return view('admin.empresas.edit', compact('paises', 'estados', 'ciudades', 'monedas', 'empresa', 'departamentos'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nombre_empresa' => 'required',
            'tipo_empresa' => 'required',
            'nit' => 'required|unique:empresas,nit,' . $id,
            'telefono' => 'required',
            'correo' => 'required|unique:empresas,correo,' . $id,
            'cantidad_impuesto' => 'required',
            'direccion' => 'required',

        ]);
        $empresa = Empresa::find($id);

        $empresa->pais = $request->pais;
        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->tipo_empresa = $request->tipo_empresa;
        $nit = $request->nit;
        $empresa->telefono = $request->telefono;
        $empresa->correo = $request->correo;
        $empresa->cantidad_impuesto = $request->cantidad_impuesto;
        $empresa->nombre_impuesto = $request->nombre_impuesto;
        $empresa->moneda = $request->moneda;
        $empresa->direccion = $request->direccion;
        $empresa->ciudad = $request->ciudad;
        $empresa->departamento = $request->departamento;
        $empresa->codigo_postal = $request->codigo_postal;

        if ($request->hasFile('logo')) {
            Storage::delete('public/' . $empresa->logo);
            $empresa->logo = $request->file('logo')->store('logos', 'public');
        }

        $empresa->save();

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->name = "Admin";
        $user->email = $request->correo;
        $user->password = Hash::make($request['nit']);
        $user->save();

        return redirect()->route('admin.index')
            ->with('icon', 'success')
            ->with('message', 'Empresa actualizada')
            ->with('success', 'correctamente');
    }

    public function destroy(Empresa $empresa)
    {
        //
    }
    public function buscar_estado($id_pais)
    {
        try {
            $estados = DB::table('states')->where('country_id', $id_pais)->get();
            return view('admin.empresas.cargar_estados', compact('estados'));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error']);
        }
    }
    public function buscar_ciudad($id_ciudad)
    {
        try {
            $ciudades = DB::table('cities')->where('state_id', $id_ciudad)->get();
            return view('admin.empresas.cargar_ciudades', compact('ciudades'));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error']);
        }
    }
}
