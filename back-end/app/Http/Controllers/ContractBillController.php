<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContractBillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Contract $contract)
    {
        return $contract->bills()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Contract $contract, Request $request)
    {
        $validated = $request->validate([
            'services' => 'required',
            'contract_id' => 'prohibited',
            'seller_id' => 'required',
            'customer_id' => 'required',
            'amount' => Rule::prohibitedIf(
                Contract::find($contract->id)->price - Contract::find($contract->id)->advance_payment_sum < $request->amount
            ),
        ]);
        $validated['contract_id'] = $contract->id;
        return response()->json(Bill::create($validated), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bill $bill)
    {
        return response()->json([$bill], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract, Bill $bill)
    {
        $validated = $request->validate([
            'services' => 'sometimes|required',
            'contract_id' => 'prohibited',
            'seller_id' => 'sometimes|required',
            'customer_id' => 'sometimes|required',
            'amount' => Rule::prohibitedIf(
                Contract::find($contract->id)->price - Contract::find($contract->id)->advance_payment_sum < $request->amount
            ),
        ]);

        $validated['contract_id'] = $contract->id;
        $bill->update($validated);

        return response()->json($bill, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        $bill->delete();

        return response()->json(['message'=>'Resource (bill) deleted successfully.'], 200);
    }
}
