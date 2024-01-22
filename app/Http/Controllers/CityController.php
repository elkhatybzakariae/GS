<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $city = City::orderBy('id_City', 'desc')->get();
        return response()->json(['city' => $city]);
    }
    public function store(CityRequest $request)
    {
        $customIdPro = Helpers::generateIdCity();
        $validatedData = $request->validated();
        $validatedData['id_City'] = $customIdPro;
        City::create($validatedData);
        return response()->json(['message' => 'City created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $city = City::find($id);
        if (!$city) {
            return response()->json(['error' => 'City not found'], 404);
        }
        return response()->json(['city' => $city]);
    }

    public function update(CityRequest $request, $id)
    {
        $city = City::find($id);
        if (!$city) {
            return response()->json(['error' => 'City not found'], 404);
        }
        $city->update($request->validated());
        return response()->json(['message' => 'City updated successfully']);
    }

    public function destroy($id)
    {
        $city = City::find($id);
        if (!$city) {
            return response()->json(['error' => 'City not found'], 404);
        }
        $city->delete();
        return response()->json(['message' => 'City deleted successfully']);
    }
}
