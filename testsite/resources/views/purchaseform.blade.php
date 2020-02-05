@extends('layouts.app', ['class' => 'bg-default'])

@section('content')


   <div class="header bg-gradient-success py-7 py-lg-8">
        <div class="container">

        	
                <div class="row justify-content-center">
                <h1 class="text-white">Purchase Order Details</h1>
                	</div> 
                	<br>
                	<br>
                <div class="row justify-content-center">
				 <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-4"><small>{{ __('Enter details below to store them') }}</small></div>
                        <div class="text-center">


					 <form role="form" method="POST" action="{{ route('purchasedetails') }}">
					 	@csrf

							<div class="form-group">
							    <div class="input-group input-group-alternative">
							        <div class="input-group-prepend">
							            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
							        </div>
							        <input class="form-control" id="date" name="date" placeholder="Order Date" type="text"/>
							    </div>
							</div>
							

							<div class="form-group{{ $errors->has('ordno') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-box-2"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('ordno') ? ' is-invalid' : '' }}" placeholder="{{ __('Order Number') }}" type="text" name="ordno" value="{{ old('ordno') }}" required autofocus>
                                </div>
                                @if ($errors->has('ordno'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('ordno') }}</strong>
                                    </span>
                                @endif
                            </div>






							<div class="form-group">
							    <div class="input-group input-group-alternative">
							        <div class="input-group-prepend">
							            <span class="input-group-text"><i class="ni ni-bullet-list-67"></i></span>
							        </div>
							        <input class="form-control" name="bolno" placeholder="BOL (Bill Of Lading) Number" type="text"/>
							    </div>
							</div>
							<div class="form-group">
							    <div class="input-group input-group-alternative">
							        <div class="input-group-prepend">
							            <span class="input-group-text"><i class="ni ni-align-center"></i></span>
							        </div>
							        <input class="form-control" name="invoiceno" placeholder="Invoice Number" type="text"/>
							    </div>
							</div>
							<div class="form-group">
							    <div class="input-group input-group-alternative">
							        <div class="input-group-prepend">
							            <span class="input-group-text"><i class="ni ni-cart"></i></span>
							        </div>
							        <input class="form-control" name="customer" placeholder="Customer" type="text"/>
							    </div>
							</div>
							<div class="form-group">
							    <div class="input-group input-group-alternative">
							        <div class="input-group-prepend">
							            <span class="input-group-text"><i class="ni ni-delivery-fast"></i></span>
							        </div>
							        <input class="form-control" name="distributor" placeholder="Distributor" type="text"/>
							    </div>
							</div>
							<div class="form-group">
							    <div class="input-group input-group-alternative">
							        <div class="input-group-prepend">
							            <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
							        </div>
							        <input class="form-control" name="soldto" placeholder="Sold to" type="text"/>
							    </div>
							</div>
							<div class="form-group">
							    <div class="input-group input-group-alternative">
							        <div class="input-group-prepend">
							            <span class="input-group-text"><i class="ni ni-archive-2"></i></span>
							        </div>
							        <input class="form-control" name="type" placeholder="Type" type="text"/>
							    </div>
							</div>

		   					<button type="submit" class="btn btn-success mt-4">{{ __(' Submit Details') }}</button>
		   


					</form>
				</div>
				</div>
				</div>
				</div>
				</div>
		</div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-1000">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>

@endsection
