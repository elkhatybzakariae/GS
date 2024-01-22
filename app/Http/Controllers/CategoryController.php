<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id_Cat', 'desc')->get();

        return response()->json(['categories' => $categories]);

        // if ($request->expectsJson()) {
        //     return response()->json(['categories' => $categories]);
        // }    
        // return view('management.categorie.index', compact('categories'));
    }


    // public function create()
    // {
    //     return view('management.categorie.create');
    // }



    public function store(CategoryRequest $request)
    {
        $customIdCat = Helpers::generateIdCat();
        $validatedData = $request->validated();
        $validatedData['id_Cat'] = $customIdCat;
        Category::create($validatedData);
        // return redirect()->route('categorie.index')->with('success', 'Categorie created successfully');
        return response()->json(['message' => 'Category created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }
        return response()->json(['category' => $category]);
    }

    public function update(CategoryRequest $request, $id)
    {

        $category = Category::find($id);
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $category->update($request->validated());
        return response()->json(['message' => 'Category updated successfully']);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
