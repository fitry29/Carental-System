@extends('layouts.default_customer')
@section('content')
    <div class="row">
        <div class="col d-md-flex align-items-start justify-content-center">
            <div class=" container col-10 col-md-3 gap-2 " id="rental-info-box">
                <div class="col-12 p-4 border shadow rounded-4 mt-4">
                    <div class="fs-4 fw-bold">Date Checker</div>
                    <form class="row align-items-end" action="{{ route('rentals.search-available-car') }}" method="get">
                        @csrf    
                        <div class="form-group col-md-12 col-12">
                            <label for="rental_date">Rental Date</label>
                            <input type="date" class="form-control border-dark  rounded-4" id="rental_date" name="rental_date" value="{{ $rental_date }}" required/>
                        </div>
                        <div class="form-group col-md-12 col-12">
                            <label for="return_date">Return Date</label>
                            <input type="date" class="form-control border-dark rounded-4" id="return_date" name="return_date" value="{{ $return_date }}" required/>
                        </div>
                        <div class="form-group col-md-12 col-12">
                            <input class="btn btn-dark col-12 rounded-4" type="submit" value="Book Now"/>
                        </div>
                    </form>
                </div>
                <div class="col-12 p-4 border shadow rounded-4 mt-4 gap-3">
                    <div class="fs-4 fw-bold"  >Rental Information</div>
                    <form action="{{ route('rentals.store') }}" method="post">
                        @csrf
                        
                        <div class="fs-5 mt-3" id="rental_date_display" >Rental Date: {{ $rental_date }}</div>
                        <div class="fs-5" id="return_date_display">Return Date:  {{ $return_date }}</div>
                        <hr>
                        <div class="fs-4 fw-semibold mt-3">Car Information</div>
                        <div class="d-flex mt-3">
                            <div class="fs-5 me-1" id="car_brand"></div>
                            <div class="fs-5 me-1" id="car_model"></div>
                            <div class="fs-5 me-1" id="car_year"></div>
                        </div>
                        <!-- <div class="fs-5 mt-3">Proton Saga 2022</div> -->
                        <div class="fs-5" id="car_category" ></div>
                        <div class="d-flex gap-1 ">
                            <div class="fs-5 me-1">Plate Number:</div>
                            <div class="fs-5 me-1" id="car_plate"></div>
                        </div>
                        <div class="d-flex gap-1 ">
                            <div class="fs-5 me-1">Rental per Day: RM</div>
                            <div class="fs-5 me-1" id="car_price"></div>
                        </div>
                        <div class="d-flex gap-1 ">
                            <div class="fs-5 me-1">Rental Duration(day):</div>
                            <div class="fs-5 me-1" id="rental_duration"></div>
                        </div>
                        <hr>
                        <div class="d-flex gap-1 mt-3 mb-4">
                            <div class="fs-4 fw-semibold">Total: RM</div>
                            <div class="fs-4 fw-semibold" id="rental_total"></div>
                        </div>

                            {{-- Hidden input untuk hantar data ke backend --}}
                            <!-- <input type="hidden" name="user_id" value = "{{Auth::id()}}"> -->
                            <input type="hidden" name="car_id" id="car_id">
                            <input type="hidden" name="rental_date" value="{{ $rental_date }}">
                            <input type="hidden" name="return_date" value="{{ $return_date }}">
                            <input type="hidden" name="total_price" id ="total_price">

                        <input class="btn btn-dark col-12 rounded-4 fs-4" type="submit" value="Pay"/>
                    </form>
                </div>
            </div>

            <div class="container mt-4 p-2" id="car" style="min-height: 50vh;">
                <div class="row">
                    <div class="col-12 bg-none text-center fw-bold">
                        <p class="fs-1 fw-bold">Available Cars Select Yours</p>
                    </div>
                    <div class="col-12 bg-none text-center">
                        <p class="fs-5" > Vehicles come in 4 main sizes.</p>
                    </div>
                </div>
                <div class="row d-flex gap-5 justify-content-center py-4">
                    @foreach ($cars as $c)
                        <div class="card col-md-4 col-8">
                            <img src="{{asset('images/'. $c->image_path) }}" class="card-img-top img-fluid pt-4" alt="..." style="max-height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $c->brand }} {{ $c->model }} {{ $c->year }}</h5>
                                <p class="card-text fs-5">{{ $c->category->name }} | RM{{ $c->rental_price }}</p>
                                <a href="#rental-info-box" class="btn btn-dark rounded-4 fs-6 col-12 select-car-btn text-light" 
                                    data-id= "{{ $c->id }}"
                                    data-brand= "{{ $c->brand }}"
                                    data-model= "{{ $c->model }}"
                                    data-plate= "{{ $c->plate_number }}"
                                    data-year= "{{ $c->year }}"
                                    data-price= "{{ $c->rental_price }}"
                                    data-category= "{{ $c->category->name }}"
                                    >
                                    Select
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container mt-4 p-4 bg-success" id="car" style="min-height: 50vh;">
        <div class="row">
            <div class="col-12 bg-none text-center fw-bold">
                <p class="fs-1 fw-bold">Meet Some of Our Car sizes</p>
            </div>
            <div class="col-12 bg-none text-center">
                <p class="fs-5" >{{ $rental_date }} vehicles come in 4 main sizes.</p>
            </div>
        </div>
        <div class="row d-flex gap-5 justify-content-center py-4">
            @foreach ($cars as $c)
                <div class="card col-md-4 col-8">
                    <img src="{{asset('images/'. $c->image_path) }}" class="card-img-top img-fluid pt-4" alt="..." style="max-height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $c->brand }} {{ $c->model }} {{ $c->year }}</h5>
                        <p class="card-text fs-5">{{ $c->category->name }} | RM{{ $c->rental_price }}</p>
                        <a href="#" class="btn btn-dark rounded-4 fs-6 col-12">Book Now</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div> -->
<script>
    // Ambil teks dari div
    const rentalText = document.getElementById("rental_date_display").textContent;
    const returnText = document.getElementById("return_date_display").textContent;

    // Buang label depan (contoh "Rental Date: ")
    const rentalDateStr = rentalText.replace("Rental Date: ", "").trim();
    const returnDateStr = returnText.replace("Return Date: ", "").trim();

    // Convert ke tarikh
    const rentalDate = new Date(rentalDateStr);
    const returnDate = new Date(returnDateStr);

    // Kira beza dalam miliseconds
    const diffTime = returnDate - rentalDate;

    // Convert miliseconds ke hari
    totalDays = diffTime / (1000 * 60 * 60 * 24);

    if(totalDays === 0){
        totalDays = 1;
    }

    // Paparkan hasil
    document.getElementById("rental_duration").textContent = `${totalDays} day`;

    document.querySelectorAll('.select-car-btn').forEach(button => {
        button.addEventListener('click', function (e){
            // e.preventDefault();
            
            // ambil semua data dari butang
            const car = {
                id: this.dataset.id,
                brand: this.dataset.brand,
                model: this.dataset.model,
                year: this.dataset.year,
                plate_number: this.dataset.plate,
                rental_price: this.dataset.price,
                category: this.dataset.category
            };

            // Masukkan ke hidden input dalam form
            document.getElementById('car_id').value = car.id;

            document.getElementById('car_brand').innerHTML = car.brand;
            document.getElementById('car_model').innerHTML = car.model;
            document.getElementById('car_year').innerHTML = car.year;
            document.getElementById('car_plate').innerHTML = car.plate_number;
            document.getElementById('car_price').innerHTML = car.rental_price;
            document.getElementById('car_category').innerHTML = car.category;

            // Kira total price
            const totalPrice = car.rental_price * totalDays;

            // Papar total price
            document.getElementById('rental_total').innerHTML = `${totalPrice.toFixed(2)}`;
            document.getElementById('total_price').value = `${totalPrice.toFixed(2)}`;

            // document.getElementById('total_price').value = `${totalPrice.toFixed(2)}`;
        });
    });

</script>
@endsection