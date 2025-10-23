<nav class="navbar navbar-expand-lg navbar-dark bg-none mt-1">
    <div class="container"> <!-- container bagi space kiri kanan -->
        <div class="row justify-content-center w-100 m-0">
            <div class="d-inline d-md-flex col-12 col-lg-12 justify-content-between bg-dark py-3 px-5 rounded-4 shadow"> <!-- 7/12 ≈ 3/5 -->
                <div class="d-flex justify-content-between align-items-center col-12 col-lg-2">
                    
                    <!-- Logo -->
                    <a class="navbar-brand d-flex align-items-center " href="#">
                        <img src="{{ asset('images/carental-logo.png') }}" alt="Logo" height="40" class="me-2">
                    </a>

                    <!-- Toggle (mobile) -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                            data-bs-target="#navbarNav" aria-controls="navbarNav" 
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                </div>
                                   <!-- Menu -->
                <div class="d-inline d-md-flex justify-content-between text-center col-10">
                    <div class="collapse navbar-collapse " id="navbarNav">
                        <ul class="navbar-nav ms-auto ">
                            <li class="nav-item"><a class="nav-link active fs-6" href="{{ route('customer.dashboard') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link fs-6" href="#about">About</a></li>
                            <li class="nav-item"><a class="nav-link fs-6" href="#car">Car</a></li>
                            <li class="nav-item"><a class="nav-link fs-6" href="#contact">Contact</a></li>
                        </ul>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="d-flex navbar-nav ms-auto ">
                            @if(auth()->check())
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <button class="nav-link fs-6 my-1 bg-none text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Welcome, {{ auth()->user()->name }}
                                        </button>
                                        <ul class="dropdown-menu rounded-4">
                                            <li><a class="dropdown-item fs-6 rounded-4 px-5 py-3" href="/order/{{auth()->user()->id}}">My Order</a></li>
                                            <li><a class="dropdown-item fs-6 rounded-4 px-5 py-3" href="#">Profile</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- <li class="nav-item"><p class="nav-link fs-6 my-1"">Welcome, {{ auth()->user()->name }}</p></li> -->
                                <li class="nav-item">
                                    <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                        <input type="submit" value="Logout" class="btn btn-light fs-6 rounded-4 my-1"" >
                                    </form>
                                </li>
                            @else
                                <li class="nav-item"><a class="btn btn-light fs-6 rounded-4 my-1" href="{{ route('register') }}"><i class="fa fa-user me-3"></i>Register</a></li>
                                <li class="nav-item"><a class="btn btn-light fs-6 rounded-4 my-1" href="{{ route('login') }}">Login</a></li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>