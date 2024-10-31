<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        // Verificar todos los datos recibidos
        // dd($request->all());
    
        // Validar y obtener datos válidos
        $datos = $request->validate([
            "name" => "required|unique:categories,name",
            "description" => "required",
            "slug" => "required|unique:categories,slug",
        ]);
    
        // Crear la categoría
        Category::create($datos);
    
        // Obtener todas las categorías para la vista
        $categories = Category::all();
        
        // Devolver la vista con un mensaje de éxito
        return view('admin.categories.index', compact('categories'))
            ->with('info', 'La categoría se creó con éxito');
    }
    
    public function show(Category $categories)
    {
        return view('admin.categories.show',compact('categories'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(["name"=> "required","slug"=> "required|unique:categories,slug,$category->id",]);

        $category->update($request->all());
        return redirect()->route('admin.categories.edit', $category)->with('info','La categoría se actualizó con éxito');
    }

    public function destroy(Category $category)
    {   $category->delete();
        return redirect()->route('admin.categories.index')->with('info','La categoría se eliminó con éxito');
    }
}
