 <?php use \App\Http\Controllers\PurchaseController; 
 use \App\Http\Controllers\ProductController;

use Illuminate\Http\Request;?>
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


					 		<div>
					 			<div>
					 				<div class="text-center text-muted mb-4">
					 					<span>
                                        	<i class="ni ni-box-2 text-primary"></i> Purchase Order Number <i class="text-primary">—</i>

                                        </span>
                           			
                                        	<?php echo $val = PurchaseController::getPO() ;?>
                                    </div>
                       			</div>
                                                                       
                                   	<input type='hidden' name='ordno' value="<?php echo $val?>">
                                  
                       		</div>

                       		<div>
					 			<div>
					 				<div class="text-center text-muted mb-4">
					 					<span>
                                        	<i class="ni ni-bullet-list-67 text-primary"></i> BOL Number <i class="text-primary">—</i>
                                        </span>
                           			
                                        	<?php echo $val = PurchaseController::getBol() ;?>
                                    </div>
                       			</div>
                                                                       
                                    
                                   	<input type='hidden' name='bolno' value="<?php echo $val?>">
                                  
                       		</div>

                       		<div>
					 			<div>
					 				<div class="text-center text-muted mb-4">
					 					<span>
                                        	<i class="ni ni-align-center text-primary"></i> Invoice Number <i class="text-primary">—</i>
                                        </span>
                           			
                                        	<?php echo $val = PurchaseController::getInvoice() ;?>
                                    </div>
                       			</div>
                                                                       
                                    
                                    
                                   	<input type='hidden' name='invoiceno' value="<?php echo $val?>">
                                  
                       		</div>
					 		
							<div class="form-group">
		                    <div class="input-group input-group-alternative">
		                        <div class="input-group-prepend">
		                            <span class="input-group-text"><i class="ni ni-cart"></i></span>
		                        </div>
		                  		 <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="productid" onchange="
		                  		 window.max = (getStock(this.value)); ">

	                         		<option hidden value="" >Select Product</option>
	                      			@foreach( ProductController::getProducts() as $item)

	                      			<option value="{{ $item->productid }}">{{ $item->product_name }}</option>
	                      			
	                      			@endforeach
	                      			
	                    		</select>
		                    @if ($errors->has('search'))
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('search') }}</strong>
		                        </span>
		                    @endif
		                	</div>
		           			</div>



		           			<div class="form-group">
							    <div class="input-group input-group-alternative">
							        <div class="input-group-prepend">
							            <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
							        </div>

							       <input class="form-control" name="units" placeholder="units" type="number" step= "10" required autofocus onchange="console.log(window.max);checkStock(this.value,window.max);"/>


							    </div>
							</div>

							<div class="form-group">
							    <div class="input-group input-group-alternative">
							        <div class="input-group-prepend">
							            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
							        </div>
							        <input class="form-control" id="date" name="date" placeholder="Order Date" type="text"  required autofocus/>
							    </div>
							</div>
							
							<div class="form-group">
		                    <div class="input-group input-group-alternative">
		                        <div class="input-group-prepend">
		                            <span class="input-group-text"><i class="ni ni-cart"></i></span>
		                        </div>
		                  		 <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="customer">
	                         		<option hidden value="" >Select Customer</option>
	                      			@foreach( PurchaseController::getCustomers() as $item)

	                      			<option value="{{ $item->customer }}">{{ $item->customer }}</option>
	                      			@endforeach
	                    		</select>
		                    @if ($errors->has('search'))
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('search') }}</strong>
		                        </span>
		                    @endif
		                	</div>
		           			</div>


		           			<div class="form-group">
		                    <div class="input-group input-group-alternative">
		                        <div class="input-group-prepend">
		                            <span class="input-group-text"><i class="ni ni-cart"></i></span>
		                        </div>
		                  		 <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="distributor">
	                         		<option hidden value="" >Select Distributor</option>
	                      			@foreach( PurchaseController::getDistributors() as $item)

	                      			<option value="{{ $item->distributor }}">{{ $item->distributor }}</option>
	                      			@endforeach
	                    		</select>
		                    @if ($errors->has('search'))
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('search') }}</strong>
		                        </span>
		                    @endif
		                	</div>
		           			</div>

		           			
							



							<div class="form-group">
							    <div class="input-group input-group-alternative">
							        <div class="input-group-prepend">
							            <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
							        </div>
							        <input class="form-control" name="soldto" placeholder="Sold to" type="text" required autofocus/>
							    </div>
							</div>

							<div class="form-group">
							    <div class="input-group input-group-alternative">
							        <div class="input-group-prepend">
							            <span class="input-group-text"><i class="ni ni-archive-2"></i></span>
							        </div>
							        <input class="form-control" name="type" placeholder="Type" type="text" required autofocus/>
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
<script>
function getStock(id) {
	var max;
    $.ajax({
        type: "get",
        url: "getStock",
        async: false,
        data: "productid=" + id,
        success: function(result) {
         	max = result;
         }
    });
    return max;
};
function checkStock(units,allowed) {
	var res;
    $.ajax({
        type: "get",
        url: "checkStock",

        async: false,
        data: { units: units, allowed: allowed },
        success: function(result) {
           if(result == 1)
           	alert("Units must be less than "+allowed);

          
        }
    });
     

};
</script>