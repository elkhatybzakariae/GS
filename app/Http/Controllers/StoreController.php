<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $store = Store::all();
        return response()->json(['store' => $store]);
    }
    public function store(StoreRequest $request,$id)
    {
        $customIdStore = Helpers::generateIdStore();
        $validatedData = $request->validated();
        $validatedData['id_Store'] = $customIdStore;

        Store::create($validatedData);
        return response()->json(['message' => 'Store created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $store = Store::find($id);
        if (!$store) {
            return response()->json(['error' => 'Store not found'], 404);
        }
        return response()->json(['store' => $store]);
    }

    public function update(StoreRequest $request, $id)
    {
        $store = Store::find($id);
        if (!$store) {
            return response()->json(['error' => 'Store not found'], 404);
        }
        $store->update($request->validated());
        return response()->json(['message' => 'Store updated successfully']);
    }

    public function destroy($id)
    {
        $store = Store::find($id);
        if (!$store) {
            return response()->json(['error' => 'Store not found'], 404);
        }
        $store->delete();
        return response()->json(['message' => 'Store deleted successfully']);
    }
}
