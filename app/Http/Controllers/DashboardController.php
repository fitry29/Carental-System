<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Rental;
use App\Models\Car;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboardIndex(){
        $totalCustomer = User::where('role',0)->count();
        $totalRental = Rental::whereNotIn('status',[0,4])->count();
        $totalSales = Rental::whereNotIn('status', [0, 4])->sum('total_price');
        $totalCars = Car::count();
        $activeRentals = Rental::where('status',2)->count();
        $cancelRentals = Rental::where('status',4)->count();

        return view('pages.admin.dashboard', compact(
            'totalCustomer',
            'totalRental', 'totalSales', 'totalCars', 'activeRentals', 'cancelRentals'
        ));
    }
}
