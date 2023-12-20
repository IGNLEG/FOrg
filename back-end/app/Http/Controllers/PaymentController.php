<?php

namespace App\Http\Controllers;

use App\Enums\PaymentType;
use App\Models\Bill;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Payment::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bills_id' => 'required',
            'amount_paid' => Rule::prohibitedIf($request->amount_paid > Bill::find($request->bills_id)->amount),
            'type' => [new Enum(PaymentType::class)]
        ]);

        return response()->json(Payment::create($validated), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return response()->json($payment, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'bills_id' => 'sometimes|required',
            'amount_paid' => Rule::prohibitedIf($request->amount_paid > Bill::find($request->bills_id)->amount),
            'type' => [new Enum(PaymentType::class)]
        ]);

        $payment->update($validated);

        return response()->json($payment, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
