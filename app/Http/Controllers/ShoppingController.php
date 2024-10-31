<?php

namespace App\Http\Controllers;

use App\Models\DetailShopping;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Shopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    public function index()
    {
        $shopping = Shopping::with(['product','provider'])->get();
        return view('admin.shopping.index', compact('shopping'));
    }

    public function create()
    {
        $products = Product::where('company_id', Auth::user()->company_id)->get();
        $providers = Provider::where('company_id', Auth::user()->company_id)->get();
        return view('admin.shopping.create', compact('products', 'providers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'voucher' => 'required',
            'total_price' => 'required',
        ]);
        
        $session_id = session()->getId();
        
        $compra = new Shopping();
        $compra->date = $request->date;
        $compra->voucher = $request->voucher;
        $compra->total_price = $request->total_price;
        $compra->company_id = Auth::user()->company_id;
        $compra->save();
        
        $tmp_compras = TmpCompra::where('session_id', $session_id)->get();
        
        foreach ($tmp_compras as $tmp_compra) {
            $producto = Product::where('producto_id', $tmp_compra->producto_id)->first(); // Aquí falta una condición en el where
            $detalle_compra = new DetailShopping();
            $detalle_compra->cantidad = $tmp_compra->cantidad;
            $detalle_compra->compra_id = $compra->id;
            $detalle_compra->producto_id = $tmp_compra->producto_id;
            $detalle_compra->id_proveedor = $request->proveedor_id;
            $detalle_compra->save();
        }
        return view('admin.shopping.index');
    }

    public function show(Shopping $shop)
    {
        return view('admin.shopping.show');
    }

    public function edit(Shopping $shop)
    {
        return view('admin.shopping.edit');
    }

    public function update(Request $request, Shopping $shop)
    {
        return view('admin.shopping.index');
    }

    public function destroy(Shopping $shop)
    {
        $shop->details->delete();
        $shop->delete();
        return redirect()->route('admin.shop.index')
            ->with('icon', 'success')
            ->with('message', 'Correctamente')
            ->with('success', 'Se elimino');
    }
}
