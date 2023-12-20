<?php

namespace App\Http\Controllers;

use App\Models\Requisite;
use Illuminate\Http\Request;

class RequisiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Requisite::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
                'name' => 'required',
                'code' => 'required',
                'tax_id' => 'required',
                'address' => 'required',
                'bank_account' => 'required',
                'creation_date' => 'required'
        ]);

        return response()->json(Requisite::create($validated), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Requisite $requisite)
    {
        return response()->json($requisite, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Requisite $requisite)
    {
        $validated = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'tax_id' => 'sometimes|required',
            'address' => 'sometimes|required',
            'bank_account' => 'sometimes|required',
            'creation_date' => 'sometimes|required'
        ]);

        $requisite->update($validated);

        return response()->json($requisite, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requisite $requisite)
    {
        $requisite->delete();
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
