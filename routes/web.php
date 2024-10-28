<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShopController;
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

Route::get('/crear-empresa', [EmpresaController::class, 'create'])->name('admin.empresas.create');
// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
//     ->group(function () {
//         Route::get('/crear-empresa', [EmpresaController::class, 'create'])
//             ->name('admin.empresas.create');
//     });

//LOAD SELECT
Route::get('/crear-empresa/pais/{id_pais}', [EmpresaController::class, 'buscar_estado'])->name('admin.empresas.buscar_estado');
Route::get('/crear-empresa/estado/{id_estado}', [EmpresaController::class, 'buscar_ciudad'])->name('admin.empresas.buscar_ciudad');
// =================================================================
Route::post('/crear-empresa/create', [EmpresaController::class, 'store'])->name('admin.empresas.store');
Route::get('/empresa/edit', [EmpresaController::class, 'edit'])->name('admin.empresa.edit');
Route::put('/empresas/{id}', [EmpresaController::class, 'update'])->name('admin.empresas.update')->middleware('auth:sanctum');

// Rutas para configuraciones
Route::get('/admin/config', [EmpresaController::class, 'edit'])->name('admin.config.edit');
Route::get('/admin/config/pais/{id_pais}', [EmpresaController::class, 'buscar_estado'])->name('admin.config.buscar_estado');
Route::get('/admin/config/estado/{id_estado}', [EmpresaController::class, 'buscar_ciudad'])->name('admin.config.buscar_ciudad');
Route::put('/admin/config/{id}', [EmpresaController::class, 'update'])->name('admin.config.update');

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
//RUTAS CATEGORIES ADMIN
Route::resource('/categories', CategoryController::class)->names('admin.categories');
//RUTAS PRODUCTS ADMIN
Route::resource('/products', ProductController::class)->names('admin.products');
//RUTAS PROVIDERS ADMIN
Route::resource('/providers', ProviderController::class)->names('admin.providers');
//RUTAS shopping ADMIN
Route::resource('/shopping', ShopController::class)->names('admin.shopping');
