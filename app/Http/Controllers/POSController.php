<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\POSRequest;
use App\Models\POS;
use Illuminate\Http\Request;

class POSController extends Controller
{
    public function index()
    {
        $orders = POS::all();
        return response()->json(['orders' => $orders]);
    }
    public function store(POSRequest $request,$id)
    {
        $customIdPOS = Helpers::generateIdPOS();
        $validatedData = $request->validated();
        $validatedData['id_pos'] = $customIdPOS;
        POS::create($validatedData);
        return response()->json(['message' => 'Order created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $order = POS::find($id);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }
        return response()->json(['order' => $order]);
    }

    public function update(POSRequest $request, $id)
    {
        $order = POS::find($id);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }
        $order->update($request->validated());
        return response()->json(['message' => 'Order updated successfully']);
    }

    public function destroy($id)
    {
        $order = POS::find($id);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully']);
    }
}
