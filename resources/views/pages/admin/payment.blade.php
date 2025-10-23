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
                <h3 class="fw-bold mb-3">Payment List</h3>
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
                        <a href="#">Payment List</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Payment Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Rental Id</th>
                                            <th>Plate Number</th>
                                            <th>Customer Name</th>
                                            <th>No Phone</th>
                                            <th>Rental Date</th>
                                            <th>Return Date</th>
                                            <th>Method</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Rental Id</th>
                                            <th>Plate Number</th>
                                            <th>Customer Name</th>
                                            <th>No Phone</th>
                                            <th>Rental Date</th>
                                            <th>Return Date</th>
                                            <th>Method</th>
                                            <th>Amount(RM)</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($payments as $p)
                                            <tr>
                                                <td>{{ $p->id }}</td>
                                                <td>{{ $p->rental_id }}</td>
                                                <td> {{ $p->rental->car->plate_number }}</td>
                                                <td> {{ $p->rental->user->name }}</td>
                                                <td> {{ $p->rental->user->phone }}</td>
                                                <td> {{ $p->rental->rental_date }}</td>
                                                <td> {{ $p->rental->return_date }}</td>
                                                <td> {{ $p->method_label }}</td>
                                                <td> {{ $p->amount }}</td>
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