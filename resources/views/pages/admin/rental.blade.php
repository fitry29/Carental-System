@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="page-inner">
                <!--  -->
                @if (session()->has('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{session()->get('success')}}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <!-- <button type="button" class="btn btn-info" id="alert_demo_3_4">{{session()->get('success')}}</button> -->
                @elseif (session()->has('error'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{session()->get('error')}}.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                @endif
                <!--  -->
            <div class="page-header">
                <h3 class="fw-bold mb-3">Booking List</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                        <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Booking List</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class="mb-3 d-flex justify-content-end" ><a class="btn btn-primary" href="{{ route('cars.register') }}" >Add New Car</a></div> -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Booking Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Car</th>
                                            <th>Plate No.</th>
                                            <th>Customer</th>
                                            <th>Rental Date</th>
                                            <th>Return Date</th>
                                            <th>Status</th>
                                            <th>Total(RM)</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Car</th>
                                            <th>Plate No.</th>
                                            <th>Customer</th>
                                            <th>Rental Date</th>
                                            <th>Return Date</th>
                                            <th>Status</th>
                                            <th>Total(RM)</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($rentals as $r)
                                            <tr>
                                                <td>{{ $r->id }}</td>
                                                <td>{{ $r->car->brand }} {{ $r->car->model }}</td>
                                                <td> {{ $r->car->plate_number }}</td>
                                                <td> {{ $r->user->name }}</td>
                                                <td> {{ $r->rental_date }}</td>
                                                <td> {{ $r->return_date }}</td>
                                                <td> {{ $r->status_label }}</td>
                                                <td> {{ $r->total_price }}</td>
                                            </tr>
                                        @endforeach  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection