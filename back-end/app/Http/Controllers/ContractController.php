<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Contract::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sign_date' => 'required',
            'sign_place' => 'required',
            'customer' => 'required',
            'signee' => 'required',
            'price' => 'required',
            'tax' => 'required',
            'advance_payment_sum' => 'sometimes|required',
        ]);

        return response()->json(Contract::create($validated), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        return response()->json($contract, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract)
    {
        $validated = $request->validate([
            'sign_date' => 'sometimes|required',
            'sign_place' => 'sometimes|required',
            'customer' => 'sometimes|required',
            'signee' => 'sometimes|required',
            'price' => 'sometimes|required',
            'tax' => 'sometimes|required',
            'advance_payment_sum' => 'sometimes|required',
        ]);


        $contract->update($validated);

        return response()->json($contract, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();

        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
