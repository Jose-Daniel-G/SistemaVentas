<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        // $categorias = provider::all();
        return view('admin.providers.index');
    }

    public function create()
    {
        return view('admin.providers.create');
    }

    public function store(Request $request)
    {
        return view('admin.providers.index');
    }

    public function show(Provider $provider)
    {
        return view('admin.providers.show');
    }

    public function edit(Provider $provider)
    {
        return view('admin.providers.edit');
    }

    public function update(Request $request, Provider $provider)
    {
        return view('admin.providers.index');
    }

    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('admin.providers.index')
            ->with('icon', 'success')
            ->with('message', 'Correctamente')
            ->with('success', 'Se elimino');
    }
}
