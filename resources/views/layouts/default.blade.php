<!DOCTYPE html>
<html lang="en">
      @include('includes.head')
  
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <!-- @if(auth()->check() && in_array(auth()->user()->role, [1,2])) -->
        @include('includes.sidebar')
      <!-- @endif -->
      <!-- End Sidebar -->

      <div class="main-panel">
        <!-- @if(auth()->check() && in_array(auth()->user()->role, [1,2])) -->
          @include('includes.header')
        <!-- @endif -->

        <div class="container">
          <div class="page-inner">
            @yield('content')
          </div>
        </div>

        @include('includes.footer')
      </div>
    </div>
    @include('includes.script')
  </body>
</html>