<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::all();
        $company = Company::where('id',Auth::user()->company_id)->first();
        // return response()->json($company);
        return view('admin.providers.index', compact('providers', 'company'));
    }

    public function create()
    {
        return view('admin.providers.create');
    }

    public function store(Request $request)
    {  
        // $data = $request->all();
        // return response()->json($data);
        $request->validate([
            'company' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'cellphone' => 'required|string|max:255',
            'email' => 'required|email|unique:providers,email',  
          ]);
        
          // Create a new category instance
          $provider = new Provider;
          $provider->company = $request->company;
          $provider->name = $request->name;
          $provider->address = $request->address;
          $provider->phone = $request->phone;
          $provider->cellphone = $request->cellphone;
          $provider->email = $request->email;
          $provider->company_id = Auth::user()->company_id;
        
          // Save the category to the database
          $provider->save();
        $providers= Provider::all();
          // Handle success or redirect to desired location
        return view('admin.providers.index', compact('providers'))->with('success', 'Category created successfully!');
    }

    public function show(Provider $provider)
    {
        return view('admin.providers.show', compact('provider'));
    }

    public function edit(Provider $provider)
    {
        return view('admin.providers.edit', compact('provider'));
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
