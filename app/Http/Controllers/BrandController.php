<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::orderBy('id_Brand', 'desc')->get();
        return response()->json(['brand' => $brand]);
    }
    public function store(BrandRequest $request)
    {
        $customIdBrand = Helpers::generateIdBrand();
        $validatedData = $request->validated();
        $validatedData['id_Brand'] = $customIdBrand;
        Brand::create($validatedData);
        return response()->json(['message' => 'Brand created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }
        return response()->json(['brand' => $brand]);
    }

    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }
        $brand->update($request->validated());
        return response()->json(['message' => 'Brand updated successfully']);
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }
        $brand->delete();
        return response()->json(['message' => 'Brand deleted successfully']);
    }
}
