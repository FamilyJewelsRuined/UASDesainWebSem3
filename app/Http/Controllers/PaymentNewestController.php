<?php

namespace App\Http\Controllers;

use App\Models\PaymentNewest;
use Illuminate\Http\Request;

class PaymentNewestController extends Controller
{
    public function index()
    {
        $payments = PaymentNewest::all(); // Get all payment records
        return view('filament.resources.payment-newest.index', compact('payments'));
    }

    public function create()
    {
        return view('filament.resources.payment-newest.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'daftar_id' => 'required',
            'amount' => 'required|numeric',
            'payment_method' => 'required',
            'status' => 'required',
        ]);

        PaymentNewest::create($request->all());
        return redirect()->route('filament.resources.payment-newests.index');
    }

    public function edit(PaymentNewest $paymentNewest)
    {
        return view('filament.resources.payment-newest.edit', compact('paymentNewest'));
    }

    public function update(Request $request, PaymentNewest $paymentNewest)
    {
        $request->validate([
            'daftar_id' => 'required',
            'amount' => 'required|numeric',
            'payment_method' => 'required',
            'status' => 'required',
        ]);

        $paymentNewest->update($request->all());
        return redirect()->route('filament.resources.payment-newests.index');
    }

    public function destroy(PaymentNewest $paymentNewest)
    {
        $paymentNewest->delete();
        return redirect()->route('filament.resources.payment-newests.index');
    }
}
