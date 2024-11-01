<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TmpShopping;
use Illuminate\Http\Request;

class TmpShoppingController extends Controller
{
    public function tmp_shopping(Request $request){ 
        // dd($request->all());
        // return response()->json($request->all());
        $product = Product::where("code", $request->code)->first();
        $session_id = session()->getId();

        if($product) {
            $tmp_compra_existe = TmpShopping::where('product_id', $product->id)
                                           ->where('session_id', $session_id)
                                           ->first();
        
            if($tmp_compra_existe) {
                $tmp_compra_existe->amount += $request->amount;
                $tmp_compra_existe->save();
        
                return response()->json(['success' => true, 'message' => 'El producto fue encontrado']);
            } else {
                $tmp_shopping = new TmpShopping();
                $tmp_shopping->amount = $request->amount;
                $tmp_shopping->product_id = $product->id;
                $tmp_shopping->session_id = session()->getId();
                $tmp_shopping->save();
        
                return response()->json(['success' => true, 'message' => 'El producto fue encontrado']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Producto no encontrado']);
        }
    }
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(TmpShopping $tmpShopping)
    {
        //
    }

    public function edit(TmpShopping $tmpShopping)
    {
        //
    }

    public function update(Request $request, TmpShopping $tmpShopping)
    {
        //
    }

    public function destroy(TmpShopping $tmpShopping)
    {
        $tmpShopping->delete();
        return response()->json(['success' => true]);

    }
}
