<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Car;
use App\Models\Category;
use App\Models\Rental;

class CarController extends Controller
{
    //
    public function index(){
        // $cars = DB::table('cars')
        // ->join('categories', 'categories.id', 'cars.category_id')
        // ->select('cars.*','categories.name')
        // ->get();
        $today = now();

        // Reset kereta yang dah lepas tempoh sewa
        $expiredRentals = Rental::where('return_date', '<', $today)->get();

        foreach ($expiredRentals as $rental) {
            Car::where('id', $rental->car_id)->update(['status' => 0]);
        }

        //panggil function dalam Car model ada category()
        $cars = Car::with('category')->get();

        return view('pages.admin.car', ['cars' => $cars]);
    }

    public function createCar(){
        $categories = Category::all();
        return view('pages.admin.register_car',  ['categories' => $categories]);
    }
    
    public function editCarpage($id){
        $cars = Car::find($id);
        $categories = Category::all();

        return view('pages.admin.edit_car', ['cars' => $cars, 'categories' => $categories]);
    }

    public function store(Request $request){

        // step 1: validate data
        $data = $request->validate(
            [
                'brand' => 'required',
                'model' => 'required',
                'plate_number' => 'required',
                'year' => 'required',
                'rental_price' => 'required',
                'status' => 'required|integer|in:0,1,2',
                'image_path' => 'required|image|mimes:jpg,jpeg,png|max:2048', 
                'category_id' => 'required',
            ]
        );

        // step 2: simpan image
        $newImageName = time() . '-' . $request->brand . '-' . $request->model . '.' . $request->image_path->extension();
        $request->image_path->move(public_path('images'), $newImageName);

        // step 3: overwrite field image_path dalam $data
        $data['image_path'] = $newImageName;

        // step 4: create record
        $newCar = Car::create($data);

        return redirect(route('cars.index'))->with('success', 'Car created!');
    }

    public function modifyCar(Request $request, $id){
        //step 1: Cari Id untuk update
        $cars = Car::find($id);

        // step 2: validate data
        $data = $request->validate(
            [
                'brand' => 'required',
                'model' => 'required',
                'plate_number' => 'required',
                'year' => 'required',
                'rental_price' => 'required',
                'status' => 'required|integer|in:0,1,2',
                'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', //kekalkan yang lama pun boleh
                'category_id' => 'required',
            ]
        );

            // kalau user upload image baru
        if ($request->hasFile('image_path')) {
            $newImageName = time() . '-' . $request->brand . '-' . $request->model . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $newImageName);

            // assign image baru
            $data['image_path'] = $newImageName;
        } else {
            // kekalkan image lama
            $data['image_path'] = $cars->image_path;
        }

            // update data
        $cars->update($data);

        return redirect(route('cars.index'))->with('success', 'Car infomation updated!');
    }

    public function deleteCar($id){
        $data = Car::find($id);

        $data->delete();
        return redirect(route('cars.index'))->with('success','Car removed successful!');
    }

    public function dashboard()
    {
        $cars = Car::select('cars.*')
            ->join(DB::raw('(SELECT category_id, MIN(created_at) as min_created FROM cars GROUP BY category_id) t'),
                function ($join) {
                    $join->on('cars.category_id', '=', 't.category_id')
                            ->on('cars.created_at', '=', 't.min_created');
                })
            ->get();

        // pass data ke blade
        return view('pages.customer.dashboard', compact('cars'));
    }
}

