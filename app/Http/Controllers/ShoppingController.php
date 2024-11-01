<?php

namespace App\Http\Controllers;

use App\Models\DetailShopping;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Shopping;
use App\Models\TmpShopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    public function index()
    {
        $shopping = Shopping::all();
        // $shopping = Shopping::with(['product', 'provider'])->get();
        return view('admin.shopping.index', compact('shopping'));
    }

    public function create()
    {
        $products = Product::where('company_id', Auth::user()->company_id)->get();
        $providers = Provider::where('company_id', Auth::user()->company_id)->get();
        $session_id = session()->getId();
        $tmp_shopping = TmpShopping::where('session_id', $session_id)->get();
        // return response()->json($session_id);
        // return response()->json($tmp_shopping);
        // return view('admin.shopping.create', compact('products', 'providers'));
        return view('admin.shopping.create', compact('products', 'providers', 'tmp_shopping'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'date' => 'required',
            'voucher' => 'required',
            'total_price' => 'required',
        ]);

        $session_id = session()->getId();

        $shopping = new Shopping();
        $shopping->date = $request->date;
        $shopping->voucher = $request->voucher;
        $shopping->total_price = $request->total_price;
        $shopping->company_id = Auth::user()->company_id;
        $shopping->save();

        $tmp_shoppings = TmpShopping::where('session_id', $session_id)->get();

        foreach ($tmp_shoppings as $tmp_shopping) {
            $product = Product::where('id', $tmp_shopping->product_id)->first();
            $detail_shopping = new DetailShopping();
            $detail_shopping->amount = $tmp_shopping->amount;
            $detail_shopping->purchase_price = $product->purchase_price;
            $detail_shopping->shopping_id = $shopping->id;
            $detail_shopping->product_id = $tmp_shopping->product_id;
            $detail_shopping->provider_id = $request->provider_id;
            $detail_shopping->save();

            $product->stock += $tmp_shopping->amount;
            $product->save();
        }
        TmpShopping::where('session_id', $session_id)->delete();
        return redirect()->route('admin.TmpShopping.index')
            ->with('mensaje', 'Se registró la compra de forma correcta')
            ->with('icono', 'success');
        // $shopping = Shopping::all();
        // $shopping = Product::all();
        // return response()->json($shopping);

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
        return redirect()->route('admin.shopping.index')
            ->with('icon', 'success')
            ->with('message', 'Correctamente')
            ->with('success', 'Se elimino');
    }
}
