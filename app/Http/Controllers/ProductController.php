<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $categorias = products::all();
        return view('admin.products.index');
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        return view('admin.products.index');
    }

    public function show(Product $product)
    {
        return view('admin.products.show');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit');
    }

    public function update(Request $request, Product $product)
    {
        return view('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index')
            ->with('icon', 'success')
            ->with('message', 'Correctamente')
            ->with('success', 'Se elimino');
    }
}
