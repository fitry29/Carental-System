@extends('layouts.default_customer')
@section('content')
    <div class="row">
        <div class="col d-md-flex align-items-start justify-content-center">
            <div class="container mt-4 p-2" id="car" style="min-height: 50vh;">
                <div class="row">
                    <div class="col-12 bg-none text-center fw-bold">
                        <p class="fs-1 fw-bold">Your Orders</p>
                    </div>
                    <div class="col-12 bg-none text-center">
                        <p class="fs-5" > All your booking information is here.</p>
                    </div>
                </div>
                <div class="row d-flex gap-5 justify-content-center py-4">
                    @foreach ($rentals as $r)
                        <div class="card col-md-4 col-8">
                            <img src="{{asset('images/'. $r->car->image_path) }}" class="card-img-top img-fluid pt-4" alt="..." style="max-height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $r->car->brand }} {{ $r->car->model }} {{ $r->car->year }}</h5>
                                <p class="card-text fs-5 m-0">Rental Date :{{ $r->rental_date }}</p>
                                <p class="card-text fs-5 m-0">Return Date :{{ $r->return_date }}</p>
                                <p class="card-text fs-5 fw-bold m-0">{{ $r->car->plate_number }}</p>
                                <p class="card-text fs-5 fw-bold">Total: RM{{ $r->total_price }}</p>
                                <p class="card-text fs-6 mt-3">Booking Created at : {{ $r->created_at }}</p>
                                @if($r->status == 0)
                                    <span class="badge text-bg-danger fs-5 card-text p-2">{{ $r->status_label }}</span>
                                    <div class="row gap-2">
                                        <a href="/payment/{{$r->id}}" class="btn btn-dark rounded-4 fs-6 col-12 col-md-5 text-light mt-4 pay-order-btn"
                                            data-id= "{{ $r->id }}"
                                            data-brand= "{{ $r->total_price }}"
                                        >Pay Now</a>
                                        <a href="/cancel-rental/{{$r->id}}" class="btn btn-danger rounded-4 fs-6 col-12 col-md-5 text-light mt-4">
                                            Cancel Booking
                                        </a>
                                    </div>
                                @elseif($r->status == 1)
                                    <span class="badge text-bg-warning fs-5 card-text p-2">{{ $r->status_label }}</span>
                                @elseif($r->status == 2)
                                    <span class="badge text-bg-primary fs-5 card-text p-2">{{ $r->status_label }}</span>
                                @elseif($r->status == 3)
                                    <span class="badge text-bg-success fs-5 card-text p-2">{{ $r->status_label }}</span>
                                @elseif($r->status == 4)
                                    <span class="badge text-bg-secondary fs-5 card-text p-2">{{ $r->status_label }}</span>
                                @endif
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

<!-- <script>
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
            e.preventDefault();
            
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

</script> -->
@endsection