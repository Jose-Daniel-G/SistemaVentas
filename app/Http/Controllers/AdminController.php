<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Role;
use App\Models\Shopping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $total_roles = Role::count();
        $total_categories = Category::count();
        $total_users = User::count();
        $total_shopping = Shopping::count();
        $total_providers = Provider::count();
        $total_products = Product::count();
        $company_id = Auth::check() ? Auth::user()->company_id : redirect()->route('login');
        $company = Company::where('id', $company_id)->first();
        return view('admin.index', compact('company', 'total_users', 'total_roles', 'total_categories', 'total_shopping', 'total_products', 'total_providers'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Admin $admin)
    {
        //
    }

    public function edit(Admin $admin)
    {
        //
    }

    public function update(Request $request, Admin $admin)
    {
        //
    }

    public function destroy(Admin $admin)
    {
        //
    }
}
