<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransferRequest;
use App\Models\Transfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        $store = Transfer::all();
        return response()->json(['store' => $store]);
    }
    public function store(TransferRequest $request,$id)
    {
        $customIdTransfer = Helpers::generateIdTransfer();
        $validatedData = $request->validated();
        $validatedData['id_Transfer'] = $customIdTransfer;

        Transfer::create($validatedData);
        return response()->json(['message' => 'Transfer created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $transfer = Transfer::find($id);
        if (!$transfer) {
            return response()->json(['error' => 'Transfer not found'], 404);
        }
        return response()->json(['transfer' => $transfer]);
    }

    public function update(TransferRequest $request, $id)
    {
        $transfer = Transfer::find($id);
        if (!$transfer) {
            return response()->json(['error' => 'Transfer not found'], 404);
        }
        $transfer->update($request->validated());
        return response()->json(['message' => 'Transfer updated successfully']);
    }

    public function destroy($id)
    {
        $transfer = Transfer::find($id);
        if (!$transfer) {
            return response()->json(['error' => 'Transfer not found'], 404);
        }
        $transfer->delete();
        return response()->json(['message' => 'Transfer deleted successfully']);
    }
}
