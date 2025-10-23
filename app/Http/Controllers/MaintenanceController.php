<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Car;

class MaintenanceController extends Controller
{
    //
    public function index(){
        $maintenances = Maintenance::with('car')->get();

        return view('pages.admin.maintenance', ['maintenances' => $maintenances]);
    }

    public function createMaintenance(){
        $cars = Car::all();
        return view('pages.admin.register_maintenance', ['cars' => $cars]);
    }

    public function editMaintenancePage($id){
        $maintenances = Maintenance::find($id);
        $cars = Car::all();
        return view('pages.admin.edit_maintenance', compact('cars', 'maintenances'));
    }

    public function store(Request $request)  {
        $data = $request->validate([
            'car_id' => 'required',
            'service_date' => 'required',
            'description' => 'required',
            'cost' => 'required',
        ]);

        $newMaintenance = Maintenance::create($data);

        return redirect(route('maintenances.index'))->with('success','New Maintenance Info!');
    }

    public function modifyMaintenance($id, Request $request)  {
        $maintenances = Maintenance::findOrFail($id);

        $data = $request->validate([
            'car_id' => 'required',
            'service_date' => 'required',
            'description' => 'required',
            'cost' => 'required',
        ]);

        // $maintenances->update($data);

        // return redirect(route('maintenances.index'))->with('success','Updated Maintenance Info!');
            if ($maintenances->update($data)) {
        return redirect()
            ->route('maintenances.index')
            ->with('success', 'Updated Maintenance Info!');
    } else {
        return redirect()
            ->route('maintenances.index')
            ->with('error', 'Update failed! Please try again.');
    }
    }

    public function deleteMaintenance($id){
        $data = Maintenance::find($id);

        $data->delete();
        return redirect(route('maintenances.index'))->with('success','Removed Maintenance Info!');
    }


}
