<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\transactions;

class TransactionController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $transactions = transactions::all();
        return view('transaction.index', compact('transactions'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('transaction.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        Transactions::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    // Display the specified resource
    public function show(Transactions $transaction)
    {
        return view('transaction.show', compact('transaction'));
    }

    // Show the form for editing the specified resource
    public function edit(Transactions $transaction)
    {
        return view('transaction.edit', compact('transaction'));
    }

    // Update the specified resource in storage
    public function update(Request $request, Transactions $transaction)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(Transactions $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}

