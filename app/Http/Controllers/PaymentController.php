<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Rental;

class PaymentController extends Controller
{
    public function index(){
        $payments = Payment::with(['rental'])->get();

        return view('pages.admin.payment', compact('payments'));
    }

    //For customer Page
    public function paymentPage($id){
        $rentals = Rental::with(['car','user'])->findOrFail($id);

        return view('pages.customer.payment', compact('rentals'));
    }

    public function pay(Request $request){
        $request->validate(
            [
                'rental_id' => 'required',
                'amount' => 'required',
                'payment_method' => 'required',
            ]
        );

        // if (Payment::where('rental_id', $request->rental_id)->exists()) {
        //     return back()->with('error', 'This booking has already been paid.');
        // }

        Payment::create([
            'rental_id' => $request->rental_id,
            'amount' => $request->amount,
            'method' => $request->payment_method,
            'payment_date' => now(),// tarikh semasa
            'status' => 1,
        ]);

        $rentals = Rental::findOrFail($request->rental_id);

        // Update status jadi approved (1)
        $rentals->update([
            'status' => 1,
        ]);
        
        return redirect()->route('customer.dashboard')->with('success', 'Payment Success! Check your order');
    }
}
