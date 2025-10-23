@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Course Registration</h3>
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
                        <a href="{{ route('users.index') }}">User List</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">User Registration</a>
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
                            <form action="{{ route('users.store') }}" method="post">
                                @csrf
                                    <div class="form-group col-md-12">
                                        <label for="name">Name</label>
                                        <input type="name" class="form-control" id="name" name="name" placeholder="Enter name"/>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"/>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="phone">No Phone</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="+60123456789"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-select form-control" id="role" name="role">
                                            <option value = "1" >Staff</option>
                                            <option value = "2" >Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"/>
                                    </div>

                                    <div class="form-group col-md-12 d-flex justify-content-end align-items-end">
                                        <input class="btn btn-primary col-md-3" type="submit" value="Register" />
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection