<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StockAdjustmentRequest;
use App\Models\StockAdjustment;
use Illuminate\Http\Request;

class StockAdjustmentController extends Controller
{
    public function index()
    {
        $SA = StockAdjustment::all();
        return response()->json(['SA' => $SA]);
    }
    public function store(StockAdjustmentRequest $request,$id)
    {
        $customIdStockAdjustment = Helpers::generateIdStockAdjustment();
        $validatedData = $request->validated();
        $validatedData['id_SA'] = $customIdStockAdjustment;
        StockAdjustment::create($validatedData);
        return response()->json(['message' => 'SA created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $SA = StockAdjustment::find($id);
        if (!$SA) {
            return response()->json(['error' => 'SA not found'], 404);
        }
        return response()->json(['SA' => $SA]);
    }

    public function update(StockAdjustmentRequest $request, $id)
    {
        $SA = StockAdjustment::find($id);
        if (!$SA) {
            return response()->json(['error' => 'SA not found'], 404);
        }
        $SA->update($request->validated());
        return response()->json(['message' => 'SA updated successfully']);
    }

    public function destroy($id)
    {
        $SA = StockAdjustment::find($id);
        if (!$SA) {
            return response()->json(['error' => 'SA not found'], 404);
        }
        $SA->delete();
        return response()->json(['message' => 'SA deleted successfully']);
    }
}
