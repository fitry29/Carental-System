<!DOCTYPE html>
<html lang="en">
      @include('includes.head')
  
    <body>
        <div class="container">
            <div class="page-inner">
                <div class="page-header mb-5 mt-5">
                    <h3 class="fw-bold mb-3 text-center">Payment Gateway</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <!-- <div class="card-header">
                                <h4 class="card-title">Login</h4>
                            </div> -->
                            <div class="card-body p-5">
                                <h5 class="card-title">Booking Id : {{ $rentals->id }}</h5>
                                <h5 class="card-title">Total Amount : RM{{ $rentals->total_price }}</h5>
                                <h5 class="card-title" id="method-diplay" ></h5>
                                <h5 class="card-title mt-3">Payment Method:</h5>
                                <div class="row mt-4 d-flex justify-content-around gap-1">
                                    <div id="cashOption"  class="col-12 col-md-5 rounded-4 p-4 text-center btn shadow payment-option" data-method="0">
                                        <i class="fas fa-money-bill-wave fs-3 mb-3"></i>
                                        <div class="fs-5">Cash</div>
                                    </div>
                                    <div id="fpxOption" class="col-12 col-md-5 rounded-4 p-4 text-center btn shadow payment-option" data-method="1">
                                        <i class="fas fa-wallet fs-3 mb-3"></i>
                                        <div class="fs-5">FPX</div>
                                    </div>
                                </div>
                                <form action="{{ route('payments.pay') }}" method="post">
                                    @csrf
                                        <div class="form-group col-md-12">
                                            <input type="hidden" class="form-control" id="rental_id" name="rental_id" value="{{ $rentals->id }}" required/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="hidden" class="form-control" id="amount" name="amount" value="{{ $rentals->total_price }}" required/>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <input type="hidden" class="form-control" id="payment_method" name="payment_method" required/>
                                        </div>

                                        <div class="form-group col-md-12 d-flex justify-content-center align-items-end">
                                            <input class="btn btn-dark col-md-5" type="submit" value="Confirm" />
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const paymentOptions = document.querySelectorAll('.payment-option');
            const methodInput = document.getElementById('payment_method');
            const methodDisp = document.getElementById('method-diplay');

            paymentOptions.forEach(option => {
                option.addEventListener('click', () => {
                // buang semua highlight dulu
                paymentOptions.forEach(o => {
                    o.classList.remove('border', 'border-success'); 
                });
                    
                    // tambah highlight pada yang dipilih
                    option.classList.add('border', 'border-success');

                    // masukkan value ke input hidden
                    methodInput.value = option.dataset.method;
                    methodDisp.innerHTML = option.dataset.method;
                });
            });
        </script>
    </body>
</html>