<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate(['customer_name' => 'required', 'nit_code' => 'required', 'email' => 'required', 'phone' => 'required|numeric', 'email' => 'required']);
        $datos = $request->all();
        return response()->json($datos);
        return view('admin.customers.index');
    }

    public function show(Customer $customer)
    {
        return view('admin.customers.show');
    }

    public function edit(Customer $customer)
    {
        return view('admin.customers.edit');
    }

    public function update(Request $request, Customer $customer)
    {
        return view('admin.customers.index');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('admin.product.index')
            ->with('icon', 'success')
            ->with('message', 'Correctamente')
            ->with('success', 'Se elimino');
    }
}
