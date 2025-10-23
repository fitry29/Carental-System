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
                <h3 class="fw-bold mb-3">Car Maintenance List</h3>
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
                        <a href="#">Car Maintenance List</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3 d-flex justify-content-end" ><a class="btn btn-primary" href="{{ route('maintenances.register') }}" >Add Maintenance</a></div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Car Maintenance Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Plate No.</th>
                                            <th>Description</th>
                                            <th>Cost (RM)</th>
                                            <th>Services Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Plate No.</th>
                                            <th>Description</th>
                                            <th>Cost (RM)</th>
                                            <th>Services Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($maintenances as $m)
                                            <tr>
                                                <td>{{ $m->id }}</td>
                                                <td>{{ $m->car->plate_number }}</td>
                                                <td> {{ $m->description }}</td>
                                                <td>{{ $m->cost }}</td>
                                                <td>{{ $m->service_date }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="/edit-maintenance/{{ $m->id }}" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="/delete-maintenance/{{ $m->id }}" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg" data-original-title="Remove">
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