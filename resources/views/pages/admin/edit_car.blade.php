@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Car Edit</h3>
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
                        <a href="{{ route('cars.index') }}">Car List</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Car Edit</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h4 class="card-title">Courses</h4>
                        </div> -->
                        <div class="card-body">
                            <form action="/save-edit-car/{{ $cars->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group col-md-12">
                                        <label for="brand">Brand</label>
                                        <input type="name" class="form-control" id="brand" name="brand" placeholder="Enter car brand" value="{{$cars->brand}}"/>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="model">Model</label>
                                        <input type="text" class="form-control" id="model" name="model" placeholder="Enter car model" value="{{$cars->model}}" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="plate_number">Plate No</label>
                                        <input type="text" class="form-control" id="plate_number" name="plate_number" placeholder="Enter car plate no." value="{{$cars->plate_number}}"/>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="year">Year</label>
                                        <input type="year" class="form-control" id="year" name="year" placeholder="Enter car year" value="{{$cars->year}}"/>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="rental_price">Rental Price</label>
                                        <input type="text" class="form-control" id="rental_price" name="rental_price" placeholder="Enter car rental price" value="{{$cars->rental_price}}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-select form-control" id="status" name="status">
                                            <option value="0" {{ $cars->status == 0 ? 'selected' : '' }}>Available</option>
                                            <option value="1" {{ $cars->status == 1 ? 'selected' : '' }}>Rented</option>
                                            <option value="2" {{ $cars->status == 2 ? 'selected' : '' }}>Maintenance</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Select Category</label>
                                        <select class="form-select form-control" id="category_id" name="category_id">
                                            @foreach ($categories as $ct )
                                                <option value = {{ $ct->id }}> {{ $ct->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="image_path">Image</label>
                                        <input type="file" class="form-control" id="image_path" name="image_path"/>
                                    </div>
        
                                    <div class="form-group col-md-12 d-flex justify-content-end align-items-end">
                                        <input class="btn btn-primary col-md-3" type="submit" value="Update" />
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection