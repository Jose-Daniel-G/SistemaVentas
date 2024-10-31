<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $countries = DB::table('countries')->get();
        $estados = DB::table('states')->get();
        $cityes = DB::table('cities')->get();
        $currencies = DB::table('currencies')->get();
        return view('admin.companies.create', compact('countries', 'estados', 'cityes', 'currencies'));
    }

    public function store(Request $request)
    {
        // 
        $request->validate([
            'company_name' => 'required',
            'company_type' => 'required',
            'city' => 'required',
            'nit' => 'required|unique:companies',
            'phone' => 'required',
            'email' => 'required|unique:companies',
            'tax_amount' => 'required',
            'tax_name' => 'required',
            'address' => 'required',
            'logo' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        // dd($request->all());
        $company = new Company();

        $company->country = $request->country;
        $company->city = $request->company_name;
        $company->company_name = $request->company_name;
        $company->company_name = $request->company_name;
        $company->company_type = $request->company_type;
        $company->nit = $request->nit;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->tax_amount = $request->tax_amount;
        $company->tax_name = $request->tax_name;
        $company->currency = $request->currency;
        $company->address = $request->address;
        $company->city = $request->city;
        $company->department = $request->select_state;
        $company->zip_code = $request->zip_code;
        $company->logo = $request->file('logo')->store('logos', 'public');
        // dd($company);
        $company->save();
        // return  redirect()->back()
        $user = new User();
        $user->name = "Admin";
        $user->email = $request->email;
        $user->password = Hash::make($request['nit']);
        $user->company_id = $company->id;
        $user->save();
        
        $user->assignRole("admin");

        Auth::login($user);
        return redirect()->route('admin.index')->with('success', 'Company y usuario administrador creados y logueados con éxito');
        // return  redirect()->route('admin.index')
        // ->with('icon', 'success')
        // ->with('message', 'Se registro el rol correctamente')
        // ->with('success', 'Se registro el rol correctamente');

    }

    public function show(Company $company)
    {
        // return view('admin.index');
    }

    public function edit(Company $company)
    {
        $countries = DB::table('countries')->get();
        $estados = DB::table('states')->get();
        // $cityes = DB::table('cities')->get();
        $currencies = DB::table('currencies')->get();
        $company_id = Auth::user()->company_id;
        $company = Company::where('id', $company_id)->first();
        $departments = DB::table('states')->where('country_id',$company->country)->get();
        $cityes = DB::table('cities')->where('state_id',$company->department)->get();

        // $company = Company::findOrFail($company_id); // Aquí se usa el ID pasado en la URL

        return view('admin.companies.edit', compact('countries', 'estados', 'cityes', 'currencies', 'company', 'departments'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'company_name' => 'required',
            'company_type' => 'required',
            'nit' => 'required|unique:companies,nit,' . $id,
            'phone' => 'required',
            'email' => 'required|unique:companies,email,' . $id,
            'tax_amount' => 'required',
            'address' => 'required',

        ]);
        $company = Company::find($id);

        $company->country = $request->country;
        $company->company_name = $request->company_name;
        $company->company_type = $request->company_type;
        $nit = $request->nit;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->tax_amount = $request->tax_amount;
        $company->tax_name = $request->tax_name;
        $company->currency = $request->currency;
        $company->address = $request->address;
        $company->city = $request->city;
        $company->department = $request->department;
        $company->zip_code = $request->zip_code;

        if ($request->hasFile('logo')) {
            Storage::delete('public/' . $company->logo);
            $company->logo = $request->file('logo')->store('logos', 'public');
        }

        $company->save();

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->name = "Admin";
        $user->email = $request->email;
        $user->password = Hash::make($request['nit']);
        $user->save();

        return redirect()->route('admin.index')
            ->with('icon', 'success')
            ->with('message', 'Company actualizada')
            ->with('success', 'correctamente');
    }

    public function destroy(Company $company)
    {
        //
    }
    public function buscar_estado($id_country)
    {
        try {
            $estados = DB::table('states')->where('country_id', $id_country)->get();
            return view('admin.companies.cargar_estados', compact('estados'));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error']);
        }
    }
    public function buscar_city($id_city)
    {
        try {
            $cityes = DB::table('cities')->where('state_id', $id_city)->get();
            return view('admin.companies.cargar_cities', compact('cityes'));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error']);
        }
    }
}
