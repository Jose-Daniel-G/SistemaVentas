<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',$categories);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(["name"=> "required","slug"=> "required|unique:categories",]);

        $category = Category::create($request->all());
        return redirect()->route('admin.categories.index', $category)->with('info','La categoría se creó con éxito');
    }

    public function show(Category $categories)
    {
        return view('admin.categories.show',$categories);
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
