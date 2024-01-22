<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReturnsRequest;
use App\Models\Returns;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ReturnsController extends Controller
{
    public function index()
    {
        $returns = Returns::all();
        return response()->json(['returns' => $returns]);
    }
    public function store(ReturnsRequest $request,$id)
    {
        $customIdReturn = Helpers::generateIdReturn();
        $validatedData = $request->validated();
        $validatedData['id_R'] = $customIdReturn;

        $validatedData['returntable_id'] = $id;
        $inSupp = Supplier::where('id_Supplier', $id)->exists();
        if ($inSupp) {
            $validatedData['returntable_type'] = 'App\Models\Supplier';
        } else {
            $validatedData['returntable_type'] = 'App\Models\Customer';
        }

        Returns::create($validatedData);
        return response()->json(['message' => 'Return created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $return = Returns::find($id);
        if (!$return) {
            return response()->json(['error' => 'Return not found'], 404);
        }
        return response()->json(['return' => $return]);
    }

    public function update(ReturnsRequest $request, $id)
    {
        $return = Returns::find($id);
        if (!$return) {
            return response()->json(['error' => 'Return not found'], 404);
        }
        $return->update($request->validated());
        return response()->json(['message' => 'Return updated successfully']);
    }

    public function destroy($id)
    {
        $return = Returns::find($id);
        if (!$return) {
            return response()->json(['error' => 'Return not found'], 404);
        }
        $return->delete();
        return response()->json(['message' => 'Return deleted successfully']);
    }
}
