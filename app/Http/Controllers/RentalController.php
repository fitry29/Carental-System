<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rental;
use App\Models\Car;

class RentalController extends Controller
{
    //
    public function index(){
        // Auto update setiap kali page dibuka
        Rental::whereDate('rental_date', '<=', now())
            ->whereDate('return_date', '>', now())
            ->whereNotIn('status', [0, 3, 4]) // 0=Pending, 3=Completed, 4=Cancelled
            ->update(['status' => 2]);

        Rental::whereDate('return_date', '<', now())
            ->whereNotIn('status', [0, 4])  // exclude Pending & Cancelled
            ->update(['status' => 3]);

        $rentals = Rental::with(['car','user'])->get();

        return view('pages.admin.rental', compact('rentals'));
    }

    public function myOrder($id){
        // Auto update setiap kali page dibuka
        Rental::whereDate('rental_date', '<=', now())
            ->whereDate('return_date', '>', now())
            ->whereNotIn('status', [0, 3, 4]) // 0=Pending, 3=Completed, 4=Cancelled
            ->update(['status' => 2]);

        Rental::whereDate('return_date', '<', now())
            ->whereNotIn('status', [0, 4])  // exclude Pending & Cancelled
            ->update(['status' => 3]);

        $rentals = Rental::with(['car', 'user'])
                    ->where('user_id', $id)->latest() 
                    ->get();

        return view('pages.customer.order', compact('rentals'));
    }

    public function createRental(){
        $rentals = Rental::with(['car','user'])->get();

        return view('pages.admin.register_rental', compact('rentals'));
    }

    public function editRentalPage($id){
        $rentals = Rental::with(['car','user'])->findOrFail($id);

        return view('pages.admin.edit_rental', compact(['rentals','cars','users']));
    }

    public function searchAvailableCars(Request $request)
    {
        $request->validate([
            'rental_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after_or_equal:rental_date',
        ]);

        // $availableCars = Car::where('status', 0) // status kereta: Available
        //     ->whereDoesntHave('rentals', function ($q) use ($request) {
        //         $q->whereIn('status', [0, 1, 2]) // Pending, Approved, Active
        //         ->where(function ($q2) use ($request) {
        //             $q2->where('rental_date', '<=', $request->return_date)
        //                 ->where('return_date', '>=', $request->rental_date);
        //         });
        //     })
        //     ->get();
        $availableCars = Car::whereDoesntHave('rentals', function ($q) use ($request) {
            $q->whereIn('status', [0, 1, 2]) // Pending, Approved, Active
            ->where(function ($q2) use ($request) {
                $q2->where('rental_date', '<=', $request->return_date)
                    ->where('return_date', '>=', $request->rental_date);
            });
        })->where('status', '!=', 2)->get();

        // dd($availableCars->map(fn($car) => [
        //     'id' => $car->id,
        //     'brand' => $car->brand,
        //     'model' => $car->model,
        //     'plate_number' => $car->plate_number,
        // ]));

        return view('pages.customer.booking', [
            'cars' => $availableCars,
            'rental_date' => $request->rental_date,
            'return_date' => $request->return_date,
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'car_id' => 'required',
            'rental_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after_or_equal:rental_date',
            'total_price' => 'required',
        ]);

        try{
            $exist = DB::transaction(function () use ($request){
                        // Check overlap: rental_date hingga return_date
                        return Rental::where('car_id' , $request->car_id)
                                ->where(function ($q) use ($request){
                                    $q->where('rental_date', '<=', $request->return_date)
                                    ->where('return_date', '>=', $request->rental_date);
                        })->lockForUpdate()->exists();
                    });

            if ($exist) {
                throw new \Exception('Kereta ini sudah ditempah dalam tarikh tersebut.');
            }

            Rental::create([
                'car_id' => $request->car_id,
                'user_id' => auth()->id(),
                'rental_date' => $request->rental_date,
                'return_date' => $request->return_date,
                'total_price' => $request->total_price,
                // 'status' => $request->status,
            ]);

            return redirect(route('customer.dashboard'))->with('success', 'Tempahan berjaya dibuat.');

        } catch(\Exception $e){
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function cancel($id){
        $rentals = Rental::findOrFail($id);

        if (auth()->user()->role_label === 'customer') {
            // Customer hanya boleh cancel booking sendiri
            if ($rentals->user_id !== auth()->id()) {
                return back()->with('error', 'Anda tidak boleh batalkan booking ini.');
            }
        }

            // Update status jadi cancelled (3)
        $rentals->update([
            'status' => 4,
        ]);

        return back()->with('success', 'Tempahan berjaya dibatalkan.');
    }
}
