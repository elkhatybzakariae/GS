<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expense = Expense::orderBy('id_Expense', 'desc')->get();

        return response()->json(['expense' => $expense]);
    }
    // public function create()
    // {
    //     return view('management.categorie.create');
    // }
    public function store(ExpenseRequest $request)
    {
        $customIdExp = Helpers::generateIdExp();
        $validatedData = $request->validated();
        $validatedData['id_Expense'] = $customIdExp;
        Expense::create($validatedData);
        return response()->json(['message' => 'Expense created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $expense = Expense::find($id);
        if (!$expense) {
            return response()->json(['error' => 'Expense not found'], 404);
        }
        return response()->json(['expense' => $expense]);
    }

    public function update(ExpenseRequest $request, $id)
    {
        $expense = Expense::find($id);
        if (!$expense) {
            return response()->json(['error' => 'Expense not found'], 404);
        }
        $expense->update($request->validated());
        return response()->json(['message' => 'Expense updated successfully']);
    }

    public function destroy($id)
    {
        $expense = Expense::find($id);
        if (!$expense) {
            return response()->json(['error' => 'Expense not found'], 404);
        }
        $expense->delete();
        return response()->json(['message' => 'Expense deleted successfully']);
    }
}
