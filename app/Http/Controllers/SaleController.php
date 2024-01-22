<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return response()->json(['sales' => $sales]);
    }
    public function store(SaleRequest $request,$id)
    {
        $customIdSale = Helpers::generateIdSale();
        $validatedData = $request->validated();
        $validatedData['id_Sale'] = $customIdSale;
        Sale::create($validatedData);
        return response()->json(['message' => 'Sale created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $sale = Sale::find($id);
        if (!$sale) {
            return response()->json(['error' => 'Sale not found'], 404);
        }
        return response()->json(['sale' => $sale]);
    }

    public function update(SaleRequest $request, $id)
    {
        $sale = Sale::find($id);
        if (!$sale) {
            return response()->json(['error' => 'Sale not found'], 404);
        }
        $sale->update($request->validated());
        return response()->json(['message' => 'Sale updated successfully']);
    }

    public function destroy($id)
    {
        $sale = Sale::find($id);
        if (!$sale) {
            return response()->json(['error' => 'Sale not found'], 404);
        }
        $sale->delete();
        return response()->json(['message' => 'Sale deleted successfully']);
    }
}
