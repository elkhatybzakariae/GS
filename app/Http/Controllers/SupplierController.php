<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Models\Person;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return response()->json(['suppliers' => $suppliers]);
    }
    public function store(PersonRequest $request)
    {
        $customIdPer = Helpers::generateIdPers();
        $customIdSupp = Helpers::generateIdSupp();
        $validatedData = $request->validated();
        $validatedData['id_P'] = $customIdPer;
        Person::create($validatedData);
        Supplier::create([
            'id_Supplier'=>$customIdSupp,
            'Website'=>$request->Website,
            'id_P'=>$validatedData['id_P'],
        ]);
        return response()->json(['message' => 'Supplier created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json(['error' => 'Supplier not found'], 404);
        }
        return response()->json(['supplier' => $supplier]);
    }

    public function update(PersonRequest $request, $id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json(['error' => 'Supplier not found'], 404);
        }
        $supplier->update($request->validated());
        return response()->json(['message' => 'Supplier updated successfully']);
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json(['error' => 'Supplier not found'], 404);
        }
        $supplier->delete();
        return response()->json(['message' => 'Supplier deleted successfully']);
    }
}
