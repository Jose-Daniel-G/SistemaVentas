<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth:sanctum');

Route::get('/create-company', [CompanyController::class, 'create'])->name('admin.companies.create');
// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
//     ->group(function () {
//         Route::get('/create-company', [CompanyController::class, 'create'])
//             ->name('admin.companies.create');
//     });

//LOAD SELECT
Route::get('/create-company/country/{id_country}', [CompanyController::class, 'buscar_estado'])->name('admin.companies.buscar_estado');
Route::get('/create-company/estado/{id_estado}', [CompanyController::class, 'buscar_city'])->name('admin.companies.buscar_city');
// =================================================================
Route::post('/create-company/create', [CompanyController::class, 'store'])->name('admin.companies.store');
Route::get('/company/edit', [CompanyController::class, 'edit'])->name('admin.company.edit');
Route::put('/companies/{id}', [CompanyController::class, 'update'])->name('admin.companies.update')->middleware('auth:sanctum');

// Rutas para configuraciones
Route::get('/admin/config', [CompanyController::class, 'edit'])->name('admin.config.edit');
Route::get('/admin/config/country/{id_country}', [CompanyController::class, 'buscar_estado'])->name('admin.config.buscar_estado');
Route::get('/admin/config/estado/{id_estado}', [CompanyController::class, 'buscar_city'])->name('admin.config.buscar_city');
Route::put('/admin/config/{id}', [CompanyController::class, 'update'])->name('admin.config.update');

// Rutas para roles
Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');
Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
Route::post('/admin/roles/create', [RoleController::class, 'store'])->name('admin.roles.store');
Route::get('/admin/roles/{id}', [RoleController::class, 'show'])->name('admin.roles.show');
Route::get('/admin/roles/{id}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit');
Route::put('/admin/roles/{id}', [RoleController::class, 'update'])->name('admin.roles.update'); // Corrected to use PUT
Route::delete('/admin/roles/{id}', [RoleController::class, 'destroy'])->name('admin.roles.destroy'); // Added delete route

//RUTAS USUARIOS ADMIN
Route::resource('/users', UserController::class)->names('admin.users');
//RUTAS CUSTOMERS ADMIN
Route::resource('/customers', CustomerController::class)->names('admin.customers');
//RUTAS CATEGORIES ADMIN
// Route::resource('/categories', CategoryController::class)->names('admin.categories');
Route::resource('/admin/categories', CategoryController::class)->names('admin.categories');
//RUTAS PRODUCTS ADMIN
Route::resource('/products', ProductController::class)->names('admin.products');
//RUTAS PROVIDERS ADMIN
Route::resource('/providers', ProviderController::class)->names('admin.providers');
//RUTAS shopping ADMIN
Route::resource('/shopping', ShoppingController::class)->names('admin.shopping');
