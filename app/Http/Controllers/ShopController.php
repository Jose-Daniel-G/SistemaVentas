<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        // $categorias = shopping::all();
        return view('admin.shopping.index');
    }

    public function create()
    {
        return view('admin.shopping.create');
    }

    public function store(Request $request)
    {
        return view('admin.shopping.index');
    }

    public function show(Shop $shop)
    {
        return view('admin.shopping.show');
    }

    public function edit(Shop $shop)
    {
        return view('admin.shopping.edit');
    }

    public function update(Request $request, Shop $shop)
    {
        return view('admin.shopping.index');
    }

    public function destroy(Shop $shop)
    {
        $shop->delete();
        return redirect()->route('admin.shop.index')
            ->with('icon', 'success')
            ->with('message', 'Correctamente')
            ->with('success', 'Se elimino');
    }
}
