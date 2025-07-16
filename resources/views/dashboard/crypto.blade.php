@include('dashboard.header')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
				<b>Error!</b>{{ session('error') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert"
																aria-label="Close"></button>
	   </div>
        @elseif (session('status'))
		<div class="alert alert-success" role="alert">
		<b>Success!</b> {{ session('status') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
        @endif
        
      
            <div class="container-fluid">
                <h2 class="text-black font-w600 mb-0 me-auto mb-2 pe-3">Crypto Withdrawal</h2>
                
                <div class="row">
                    <div class="col-xl-4">
						<div class="row">
							
							
						</div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Balance: {{Auth::user()->currency}}{{number_format($balance, 2, '.', ',')}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <p>You're about to transfer from your account's available balance. This action cannot be reversed. Be sure to enter correct details.</p>
                                        <div id="response_code"></div>
                                        <form  action="{{route('crypto.transfer')}}" method="POST">
                                                 @csrf
                                                  <input type="hidden" class="form-control" name="email" value=" {{ Auth::user()->email}}"/>
                                            <p id="server"></p>
                                            <div id="content-one">
                                                <div class="form-group mb-3">
                                                    <label>Amount</label>
                                                    <input id="pin_amount" type="number" name="amount" class="form-control" placeholder="Enter Amount" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Wallet Type</label>
                                                    <select class="form-select" name="wallet_type">
                                                      <option value="Bitcoin" selected>Bitcoin</option>
                                                      <option value="Ethereum">Ethereum</option>
                                                      <option value="Litecoin">Litecoin</option>
                                                      <option value="USDT">USDT</option>
                                                     </select>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Wallet Address</label>
                                                    <input id="pin_account_number" type="text" name="wallet_address" class="form-control" Required>
                                                </div>
                                        
                                                <div class="form-group mb-3">
                                                    <label>Transaction Pin</label>
                                                    <input id="pin_account_number" type="number" name="transaction_pin" maxlength="4" class="form-control" Required>
                                                </div>
                                                

                                                <button type="submit" id="waitone" class="btn btn-primary w-100" >Proceed</button>
                                            </div> 
                                        </form>

                                            <!-- Start modal -->
                                            <div class="modal fade transfer_pin_modal" id="reqLoan">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">OTP Pin</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="alert alert-warning">
                                                                Enter a valid OTP pin for this transaction.
                                                            </div>
                                                            <div class="input-pin-grid">
                                                                <input  type="number"  name="otp" class="form-control form-control-lg">
                                                            </div>
                                                            <button type="submit" id="waitone" class="btn btn-primary w-100" >Proceed</button>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@include('dashboard.footer')
