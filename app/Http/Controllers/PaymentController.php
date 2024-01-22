<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return response()->json(['payments' => $payments]);
    }
    public function store(PaymentRequest $request,$id)
    {
        $customIdPayment = Helpers::generateIdPayment();
        $validatedData = $request->validated();
        $validatedData['id_Payment'] = $customIdPayment;
        Payment::create($validatedData);
        return response()->json(['message' => 'Payment created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }
        return response()->json(['payment' => $payment]);
    }

    public function update(PaymentRequest $request, $id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }
        $payment->update($request->validated());
        return response()->json(['message' => 'Payment updated successfully']);
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }
        $payment->delete();
        return response()->json(['message' => 'Payment deleted successfully']);
    }
}

