@extends('layouts.default_customer')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{session()->get('success')}}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <!-- <button type="button" class="btn btn-info" id="alert_demo_3_4">{{session()->get('success')}}</button> -->
    @endif
<!-- TOP content -->
    <div class="container bg-light-subtle rounded-4 p-4 border border-dark shadow d-flex justify-content-center align-items-center col-10 col-md-12 " style="min-height: 50vh;">
        <div class="row px-4">
            <div class="col-12 p-4 bg-none mt-3">
                <div class="row">
                    <div class="col-12 bg-none text-center">
                        <p class="fs-3" >Top Local Car Rental Deals</p>
                    </div>
                    <div class="col-12 bg-none text-center fw-bold">
                        <p class="fs-1 fw-bold">Book Your Car Now!</p>
                    </div>
                </div>
                <form class="row align-items-end" action="{{ route('rentals.search-available-car') }}" method="get">
                     @csrf    
                    <div class="form-group col-md-4 col-12">
                        <label for="rental_date">Rental Date</label>
                        <input type="date" class="form-control border-dark  rounded-4" id="rental_date" name="rental_date" required/>
                    </div>
                    <div class="form-group col-md-4 col-12">
                        <label for="return_date">Return Date</label>
                        <input type="date" class="form-control border-dark rounded-4" id="return_date" name="return_date" required/>
                    </div>
                    <div class="form-group col-md-4 col-12">
                        <input class="btn btn-dark col-12 rounded-4" type="submit" value="Book Now"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Our Services -->
    <div class="container mt-4 p-4" style="min-height: 50vh;">
        <!-- <div class="row">
            <div class="col-12 bg-none text-center fw-bold">
                <p class="fs-1 fw-bold">Meet Some of Our Car sizes</p>
            </div>
            <div class="col-12 bg-none text-center">
                <p class="fs-5" >Our vehicles come in 4 main sizes.</p>
            </div>
        </div> -->
        <div class="row d-flex gap-5 justify-content-center py-4 ">
                <div class="col-md-4 d-flex align-items-center col-8">
                    <div class="row m-0 p-2 text-center">
                        <div class="col"><i class="fas fa-bell fs-1"></i></div>
                    </div>
                    <div class="row m-0 p-4">
                        <div class="col-12 fs-4 fw-bold mb-1">Services</div>
                        <div class="col-12 fs-5">24-Hour Roadside Assistance for peace of mind.</div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center col-8">
                    <div class="row m-0 p-2 text-center">
                        <div class="col"><i class="fas fa-eye-slash fs-1"></i></div>
                    </div>
                    <div class="row m-0 p-4">
                        <div class="col-12 fs-4 fw-bold mb-1">No Hidden Charges</div>
                        <div class="col-12 fs-5">What you see is what you pay.</div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center col-8">
                    <div class="row m-0 p-2 text-center">
                        <div class="col"><i class="fas fa-car fs-1"></i></div>
                    </div>
                    <div class="row m-0 p-4">
                        <div class="col-12 fs-4 fw-bold mb-1">Distinctive fleet</div>
                        <div class="col-12 fs-5">Choose from a wide selection of economy and reliable vehicles.</div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center col-8">
                    <div class="row m-0 p-2 text-center">
                        <div class="col"><i class="fas fa-infinity fs-1"></i></div>
                    </div>
                    <div class="row m-0 p-4">
                        <div class="col-12 fs-4 fw-bold mb-1">Unlimited Mileage</div>
                        <div class="col-12 fs-5">Explore cities and beyond without limits.</div>
                    </div>
                </div>
        </div>
    </div>

    <!-- Our Special -->
    <div class="container mt-0 p-4" id="about" style="min-height: 50vh;">
        <div class="row">
            <div class="col-12 bg-none text-center fw-bold">
                <p class="fs-1 fw-bold">What Makes Us Different?</p>
            </div>
        </div>
        <div class="row d-flex gap-5 justify-content-center py-0 mt-4">
                <div class="col-md-4 d-flex align-items-center col-8 p-4 bg-light rounded-4 shadow">
                    <div class="row m-0 p-2 text-center gap-2">
                        <div class="col-12 mb-1"><i class="fas fa-car fs-1"></i></div>
                        <div class="col-12 fs-4 fw-bold mb-1">Wide Range Of Vehicles</div>
                        <div class="col-12 fs-5">From compact city cars to luxury SUVs, our distinctive fleet caters to every travel need. Whether it's business or leisure, we have the perfect car for your trip.</div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center col-8 p-4 bg-light rounded-4 shadow">
                    <div class="row m-0 p-2 text-center gap-2">
                        <div class="col-12 mb-1"><i class="fas fa-dollar-sign fs-1"></i></div>
                        <div class="col-12 fs-4 fw-bold mb-1">Excellent Prices</div>
                        <div class="col-12 fs-5">We offer competitive rates on all vehicles, ensuring you get top-quality cars at unbeatable prices. No need to compromise - get great value for your money every time.</div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center col-8 p-4 bg-light rounded-4 shadow">
                    <div class="row m-0 p-2 text-center gap-2">
                        <div class="col-12 mb-1"><i class="fa fa-globe fs-1"></i></div>
                        <div class="col-12 fs-4 fw-bold mb-1">Easy Online Booking</div>
                        <div class="col-12 fs-5">Skip the lines and book your car rental in minutes through our user-friendly online platform. Compare options, customize your rental, and secure your vehicle effortlessly.</div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center col-8 p-4 bg-light rounded-4 shadow">
                    <div class="row m-0 p-2 text-center gap-2">
                        <div class="col-12 mb-1"><i class="fas fa-bolt fs-1"></i></div>
                        <div class="col-12 fs-4 fw-bold mb-1">Instant Booking</div>
                        <div class="col-12 fs-5">No waiting around! Once you choose your vehicle and complete your booking, you'll receive an immediate confirmation, ensuring a smooth and hassle-free rental process.</div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center col-8 p-4 bg-light rounded-4 shadow">
                    <div class="row m-0 p-2 text-center gap-2">
                        <div class="col-12 mb-1"><i class="fas fa-bell fs-1"></i></div>
                        <div class="col-12 fs-4 fw-bold mb-1">24/7 Customer Support</div>
                        <div class="col-12 fs-5">Whether you're booking a vehicle, need assistance on the road, or have any questions, our dedicated support team is available around the clock.</div>
                    </div>
                </div>
        </div>
    </div>

<!-- Car Preview -->
    <div class="container mt-4 p-4" id="car" style="min-height: 50vh;">
        <div class="row">
            <div class="col-12 bg-none text-center fw-bold">
                <p class="fs-1 fw-bold">Meet Some of Our Car sizes</p>
            </div>
            <div class="col-12 bg-none text-center">
                <p class="fs-5" >Our vehicles come in 4 main sizes.</p>
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
    </div>


    <div class="container mt-0 p-0 d-flex flex-column justify-content-center align-items-center mb-4" style="min-height: 50vh;">
        <div class="row d-flex gap-5 justify-content-center py-0 mt-0">
                <div class="col-md-7 d-flex align-items-start col-8 p-4">
                    <div class="row m-0 p-2 text-start gap-2">
                        <div class="col-12 text-start fw-bold">
                            <p class="fs-1 fw-bolder">Carental Customer Care</p>
                        </div>
                        <div class="col-12 fs-2 fw-bolder mb-1">Always Here to Help</div>
                        <div class="col-12 fs-5 ">At BookCars, we're dedicated to providing prompt and reliable support to ensure your car rental experience is smooth and enjoyable from start to finish.</div>
                        <div class="col-12 fs-5 mt-4"><i class="fas fa-check fs-5 me-3"></i>24/7 Roadside Assistance</div>  
                        <div class="col-12 fs-5"><i class="fas fa-check fs-5 me-3"></i>Inquiries and Modifications</div>  
                        <div class="col-12 fs-5"><i class="fas fa-check fs-5 me-3"></i>Vehicle Selection Guidance</div>  
                        <div class="col-12 fs-5"><i class="fas fa-check fs-5 me-3"></i>Advice and Support</div>  
                        <div class="mt-4"><a href="" class="btn btn-dark fs-5">Contact Us</a></div>  
                    </div>
                </div>
        </div>
    </div>
    <div class="container col-10 col-md-12 border border-dark d-flex justify-content-between align-items-center p-4 mb-4 rounded-4" id="contact" style="min-height: 10vh;">
        <div class="row p-4">
            <div class="col"><a class="nav-link" href="https://github.com/fitry29" target="_blank"> Help </a></div>
            <div class="col"><a class="nav-link" href="https://github.com/fitry29" target="_blank"> Contact </a></div>
        </div>
        <div class="row p-4">
            <div class="col">2025 made with by <a href="https://github.com/fitry29" target="_blank">Fitry</a></div>
        </div>
    </div>

    
@endsection