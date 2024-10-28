<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Empresa;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Role;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {   $total_roles = Role::count();
        $total_categories = Category::count();
        $total_users = User::count();
        $total_shop = Shop::count();
        $total_providers = Provider::count();
        $total_products = Product::count();
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::where('id', $empresa_id)->first();
        return view('admin.index', compact('empresa', 'total_users','total_roles','total_categories','total_shop','total_products','total_providers'));
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
