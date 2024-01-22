<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequest;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchase = Purchase::all();
        return response()->json(['purchase' => $purchase]);
    }
    public function store(PurchaseRequest $request,$id)
    {
        $customIdPurchase = Helpers::generateIdPurchase();
        $validatedData = $request->validated();
        $validatedData['id_Purchase'] = $customIdPurchase;
        Purchase::create($validatedData);
        return response()->json(['message' => 'Purchase created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $purchase = Purchase::find($id);
        if (!$purchase) {
            return response()->json(['error' => 'Purchase not found'], 404);
        }
        return response()->json(['purchase' => $purchase]);
    }

    public function update(PurchaseRequest $request, $id)
    {
        $purchase = Purchase::find($id);
        if (!$purchase) {
            return response()->json(['error' => 'Purchase not found'], 404);
        }
        $purchase->update($request->validated());
        return response()->json(['message' => 'Purchase updated successfully']);
    }

    public function destroy($id)
    {
        $purchase = Purchase::find($id);
        if (!$purchase) {
            return response()->json(['error' => 'Purchase not found'], 404);
        }
        $purchase->delete();
        return response()->json(['message' => 'Purchase deleted successfully']);
    }
}