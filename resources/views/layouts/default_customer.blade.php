<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body class="bg-light-subtle" >
    <!-- Navbar -->
    @include('includes.navbar')

    <!-- Main Content -->
    <main class="container my-1">
        @yield('content')
    </main>

    @include('includes.script')
</body>
</html>