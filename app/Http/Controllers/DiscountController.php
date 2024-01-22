<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discount = Discount::orderBy('id_Discount', 'desc')->get();
        return response()->json(['discount' => $discount]);
    }
    // public function create()
    // {
    //     return view('management.categorie.create');
    // }
    public function store(DiscountRequest $request)
    {
        $customIdDisc = Helpers::generateIdDisc();
        $validatedData = $request->validated();
        $validatedData['id_Discount'] = $customIdDisc;
        Discount::create($validatedData);
        return response()->json(['message' => 'Discount created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $discount = Discount::find($id);
        if (!$discount) {
            return response()->json(['error' => 'Discount not found'], 404);
        }
        return response()->json(['discount' => $discount]);
    }

    public function update(DiscountRequest $request, $id)
    {
        $discount = Discount::find($id);
        if (!$discount) {
            return response()->json(['error' => 'Discount not found'], 404);
        }
        $discount->update($request->validated());
        return response()->json(['message' => 'Discount updated successfully']);
    }

    public function destroy($id)
    {
        $discount = Discount::find($id);
        if (!$discount) {
            return response()->json(['error' => 'Discount not found'], 404);
        }
        $discount->delete();
        return response()->json(['message' => 'Discount deleted successfully']);
    }
}
