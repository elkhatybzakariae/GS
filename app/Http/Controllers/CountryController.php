<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $country = Country::orderBy('id_Country', 'desc')->get();
        return response()->json(['country' => $country]);
    }
    public function store(CountryRequest $request)
    {
        $customIdPro = Helpers::generateIdCountry();
        $validatedData = $request->validated();
        $validatedData['id_Country'] = $customIdPro;
        Country::create($validatedData);
        return response()->json(['message' => 'Country created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $country = Country::find($id);
        if (!$country) {
            return response()->json(['error' => 'Country not found'], 404);
        }
        return response()->json(['country' => $country]);
    }

    public function update(CountryRequest $request, $id)
    {
        $country = Country::find($id);
        if (!$country) {
            return response()->json(['error' => 'Country not found'], 404);
        }
        $country->update($request->validated());
        return response()->json(['message' => 'Country updated successfully']);
    }

    public function destroy($id)
    {
        $country = Country::find($id);
        if (!$country) {
            return response()->json(['error' => 'Country not found'], 404);
        }
        $country->delete();
        return response()->json(['message' => 'Country deleted successfully']);
    }
}
