 <?php use \App\Http\Controllers\ProductController; ?>
@extends('layouts.app', ['class' => 'bg-default'])

@section('content')


   <div class="header bg-gradient-success py-7 py-lg-8">
        <div class="container">

        	
                <div class="row justify-content-center">
                <h1 class="text-white">Product Details</h1>
                	</div> 
                	<br>
                	<br>
                <div class="row justify-content-center">
				 <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-4"><small>{{ __('Enter details below to store them') }}</small></div>
                        <div class="text-center">


					 <form role="form" method="POST" action="{{ route('storeProduct') }}">
					 	@csrf

					 	<div>
					 		<div>
					 			<div class="text-center text-muted mb-4">
					 				<span>
                                        	<i class="ni ni-box-2 text-primary"></i> Product ID <i class="text-primary">—</i>

                                        </span>
                           	 <?php echo $val = ProductController::getProductID() ;?></div>
                       			 </div>
                                                                       
                                   	<input type='hidden' name='productid' value="<?php echo $val?>">
                                  
                        </div>   
                           

							<div class="form-group">
							    <div class="input-group input-group-alternative">
							        <div class="input-group-prepend">
							            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
							        </div>
							        <input class="form-control" id="date" name="date_of_stocking" placeholder="Stocking Date" type="text"  required autofocus/>
							    </div>
							</div>

							<div class="form-group">
							    <div class="input-group input-group-alternative">
							        <div class="input-group-prepend">
							            <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
							        </div>
							        <input class="form-control" name="active_stock" placeholder="Units" type="text" required autofocus/>
							    </div>
							</div>

							



							<div class="form-group">
							    <div class="input-group input-group-alternative">
							        <div class="input-group-prepend">
							            <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
							        </div>
							        <input class="form-control" name="product_name" placeholder="Product Name" type="text" required autofocus/>
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
