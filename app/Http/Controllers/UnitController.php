<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\UnitRequest;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $unit = Unit::orderBy('id_Unit', 'desc')->get();
        return response()->json(['unit' => $unit]);
    }
    // public function create()
    // {
    //     return view('management.categorie.create');
    // }
    public function store(UnitRequest $request)
    {
        $customIdUnit = Helpers::generateIdUnit();
        $validatedData = $request->validated();
        $validatedData['id_Unit'] = $customIdUnit;
        Unit::create($validatedData);
        return response()->json(['message' => 'Unit created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $unit = Unit::find($id);
        if (!$unit) {
            return response()->json(['error' => 'Unit not found'], 404);
        }
        return response()->json(['unit' => $unit]);
    }

    public function update(UnitRequest $request, $id)
    {
        $unit = Unit::find($id);
        if (!$unit) {
            return response()->json(['error' => 'Unit not found'], 404);
        }
        $unit->update($request->validated());
        return response()->json(['message' => 'Unit updated successfully']);
    }

    public function destroy($id)
    {
        $unit = Unit::find($id);
        if (!$unit) {
            return response()->json(['error' => 'Unit not found'], 404);
        }
        $unit->delete();
        return response()->json(['message' => 'Unit deleted successfully']);
    }
}
