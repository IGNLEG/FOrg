<?php

namespace App\Http\Controllers;

use App\Enums\PaymentType;
use App\Models\Bill;
use App\Models\Contract;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ContractBillPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Contract $contract, Bill $bill)
    {
        if($bill->contract_id != $contract->id){
            return response()->json(['message'=>'Bad bill id.'], 400);
        }
        return response()->json($bill->payments()->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Contract $contract, Bill $bill, Request $request)
    {
        $validated = $request->validate([
            'bills_id' => 'prohibited',
            'amount_paid' => Rule::prohibitedIf($request->amount_paid > $bill->amount),
            'type' => [new Enum(PaymentType::class)]
        ]);
        $validated['bill_id'] = $bill->id;
        return response()->json(Payment::create($validated), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract, Bill $bill, Payment $payment)
    {
        if($bill->contract_id != $contract->id){
            return response()->json(['message'=>'Bad bill id.'], 400);
        }
        if($payment->bill_id != $bill->id){
            return response()->json(['message'=>'Bad payment id.'], 400);
        }
        return response()->json($payment, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Contract $contract, Bill $bill, Payment $payment, Request $request)
    {
        $validated = $request->validate([
            'bills_id' => 'prohibited',
            'amount_paid' => Rule::prohibitedIf($request->amount_paid > $bill->amount),
            'type' => [new Enum(PaymentType::class)]
        ]);

        $payment->update($validated);

        return response()->json($payment, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract, Bill $bill, Payment $payment)
    {
        $payment->delete();
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
