<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:products,code',
            'name' => 'required',
            'stock' => 'required',
            'stock_min' => 'required',
            'stock_max' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'admission_date' => 'required',
            'category_id' => 'required'
        ]);

        $product = new Product();
        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->stock_min = $request->stock_min;
        $product->stock_max = $request->stock_max;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->admission_date = $request->admission_date;
        $product->category_id = $request->category_id;
        $product->company_id = Auth::user()->company_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('products', 'public');
            $product->image = $image;
        }

        $product->save();

        return redirect()->route('admin.products.index')
            ->with('icon', 'success')
            ->with('message', 'Correctamente')
            ->with('success', 'Se agregó');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'code' => 'required|unique:products,code,' . $product->id,
            'name' => 'required',
            'stock' => 'required',
            'stock_min' => 'required',
            'stock_max' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'admission_date' => 'required',
            'category_id' => 'required'
        ]);

        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->stock_min = $request->stock_min;
        $product->stock_max = $request->stock_max;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->admission_date = $request->admission_date;
        $product->category_id = $request->category_id;
        $product->company_id = Auth::user()->company_id;

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $product->image);
            $image = $request->file('image')->store('products', 'public');
            $product->image = $image;
        }

        $product->save();

        return redirect()->route('admin.products.index')
            ->with('icon', 'success')
            ->with('message', 'Correctamente')
            ->with('success', 'Se actualizó');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')
            ->with('icon', 'success')
            ->with('message', 'Correctamente')
            ->with('success', 'Se eliminó');
    }
}
