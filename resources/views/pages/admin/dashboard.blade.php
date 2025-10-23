@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="page-inner">
                @if (session()->has('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{session()->get('success')}}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <!-- <button type="button" class="btn btn-info" id="alert_demo_3_4">{{session()->get('success')}}</button> -->
                @endif
            <h3 class="fw-bold mb-3">Dashboard</h3>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Student Course Pie Chart</div>
                    </div>
                    <div class="card-body">
                                                    <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <input type="submit" value="Logout" class="dropdown-item" >
                            </form>
                    <div class="chart-container">
                        <canvas
                        id="pieChart"
                        style="width: 50%; height: 50%"
                        ></canvas>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection