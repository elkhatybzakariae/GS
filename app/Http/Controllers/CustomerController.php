<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Models\Customer;
use App\Models\Person;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json(['customers' => $customers]);
    }
    public function store(PersonRequest $request)
    {
        $customIdPer = Helpers::generateIdPers();
        $customIdCus = Helpers::generateIdCus();
        $validatedData = $request->validated();
        $validatedData['id_P'] = $customIdPer;
        Person::create($validatedData);
        Customer::create([
            'id_Cus'=>$customIdCus,
            'customerCode'=>$request->customerCode,
            'id_P'=>$validatedData['id_P'],
        ]);
        return response()->json(['message' => 'Customer created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }
        return response()->json(['customer' => $customer]);
    }

    public function update(PersonRequest $request, $id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }
        $customer->update($request->validated());
        return response()->json(['message' => 'Customer updated successfully']);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }
        $customer->delete();
        return response()->json(['message' => 'Customer deleted successfully']);
    }
}
