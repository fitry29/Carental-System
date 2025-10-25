<!DOCTYPE html>
<html lang="en">
      @include('includes.head')
  
    <body>
        <div class="container">
            <div class="page-inner">
                <div class="page-header mb-5 mt-5">
                    <h3 class="fw-bold mb-3 text-center">Welcome to Carental, Join Us Now</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <!-- <div class="card-header">
                                <h4 class="card-title">Login</h4>
                            </div> -->
                            <div class="card-body">
                                <form action="{{ route('register.submit') }}" method="post">
                                    @csrf
                                        <div class="form-group col-md-12">
                                            <label for="name">Name</label>
                                            <input type="name" class="form-control" id="name" name="name" placeholder="Enter your name" required/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="phone">No Phone</label>
                                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="+60" required/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required/>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="showPasswordCheckbox">
                                            <label class="form-check-label" for="showPasswordCheckbox">
                                            Show password
                                            </label>
                                        </div>

                                        <div class="form-group col-md-12 d-flex justify-content-between align-items-end">
                                            <a href="{{ route('login') }}" class="text-dark-emphasis" >Login Here</a>
                                            <input class="btn btn-dark col-md-3" type="submit" value="Register" />
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Untuk view password -->
                <script>
                    document.getElementById('showPasswordCheckbox').addEventListener('change', function () {
                    const input = document.getElementById('password');
                    input.type = this.checked ? 'text' : 'password';
                    });
                </script>
                    <!-- Untuk Phone auto masuk +60 -->
                <script>
                document.getElementById('phone').addEventListener('blur', function() {
                    if (!this.value.startsWith('+60')) {
                        this.value = '+60' + this.value.replace(/^0/, ''); 
                    }
                });
                </script>
        </div>
    </body>
</html>