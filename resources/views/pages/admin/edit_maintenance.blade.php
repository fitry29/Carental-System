@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Car Maintenance Edit</h3>
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
                        <a href="{{ route('maintenances.index') }}">Car Maintenance List</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Car Maintenance Edit</a>
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
                            <form action="/save-edit-maintenance/{{$maintenances->id}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                    <label for="car_id">Select Car</label>
                                        <select class="form-select form-control" id="car_id" name="car_id">
                                            @foreach ($cars as $c )
                                                <option value = {{ $c->id }} > {{ $c->brand }} {{ $c->model }} - {{ $c->plate_number }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="service_date">Service Date</label>
                                        <input type="date" class="form-control" id="service_date" name="service_date" value = " {{ $maintenances->service_date }}" required/>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="description">Description</label>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Eg: Change oil, Tyre Replacement etc"  value = " {{ $maintenances->description }}" required/>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="cost">Cost</label>
                                        <input type="text" class="form-control" id="cost" name="cost"  min="0" step="0.01" placeholder="Eg: RM 129.20"  value = " {{ $maintenances->cost }}" required/>
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