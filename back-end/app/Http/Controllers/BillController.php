<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Bill::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'services' => 'required',
            'contract_id' => 'required',
            'seller_id' => 'required',
            'customer_id' => 'required',
            'amount' => Rule::prohibitedIf(
                Contract::find($request->contract_id)->price - Contract::find($request->contract_id)->advance_payment_sum < $request->amount
            ),
        ]);

        return response()->json(Bill::create($validated), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bill $bill)
    {
        return response()->json($bill, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bill $bill)
    {
        $validated = $request->validate([
            'services' => 'sometimes|required',
            'contract_id' => 'prohibited',
            'seller_id' => 'sometimes|required',
            'customer_id' => 'sometimes|required',
            'amount' => Rule::prohibitedIf(
                Contract::find($request->contract_id)->price - Contract::find($request->contract_id)->advance_payment_sum < $request->amount
            ),
        ]);

        $bill->update($validated);

        return response()->json($bill, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        $bill->delete();
        return response()->json(['message' => 'Deleted successfully'], 200);

    }
}
