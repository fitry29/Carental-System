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
                <h3 class="fw-bold mb-3">Car List</h3>
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
                        <a href="#">Car List</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3 d-flex justify-content-end" ><a class="btn btn-primary" href="{{ route('cars.register') }}" >Add New Car</a></div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Car Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Plate No.</th>
                                            <th>Year</th>
                                            <th>Rental(RM)</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Plate No.</th>
                                            <th>Year</th>
                                            <th>Rental(RM)</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($cars as $c)
                                            <tr>
                                                <td>{{ $c->id }}</td>
                                                <td>{{ $c->brand }}</td>
                                                <td> {{ $c->model }}</td>
                                                <td> {{ $c->plate_number }}</td>
                                                <td> {{ $c->year }}</td>
                                                <td> {{ $c->rental_price }}</td>
                                                <td>
                                                    @if($c->status == 0)
                                                        <span class="badge text-bg-primary">{{ $c->status_label }}</span>
                                                    @elseif($c->status == 1)
                                                        <span class="badge text-bg-secondary">{{ $c->status_label }}</span>
                                                    @elseif($c->status == 2)
                                                        <span class="badge text-bg-warning">{{ $c->status_label }}</span>
                                                    @endif
                                                </td>
                                                <td><a href="{{ asset('images/' .$c->image_path)}}" target="_blank">{{ $c->image_path}}</a></td>
                                                <!-- bawah ni categories name -->
                                                <td> {{ $c->category->name }}</td>  
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="/edit-car/{{ $c->id }}" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="/delete-car/{{ $c->id }}" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg" data-original-title="Remove">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                </td>
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