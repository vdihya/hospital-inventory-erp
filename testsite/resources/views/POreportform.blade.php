@extends('layouts.app', ['class' => 'bg-primary'])

@section('content')

   <div class="header bg-gradient-dark py-7 py-lg-8">
        <div class="container">

        	
                <div class="row justify-content-center">
                <h1 class="text-white">Purchase Orders Report</h1>
                	</div> 
                	<br>
                	<br>

        <div class="container">
                <div class="row justify-content-center">
				 <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-4"><small>{{ __('What details should the report contain') }}</small></div>
                        <div class="text-center">




        <form action="/POpdf" method="get" role="POpdf">
                @csrf
                
            
                <div class="col">
                <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    </div>
                                    <input class="form-control" name="search" placeholder="Search" type="text"/>
                                </div>
                </div>
                </div>
                <div class="col">
                <div class="input-daterange datepicker row align-items-center">
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                               <input class="form-control" id="date" name="startdate" placeholder="Start Date" type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                               <input class="form-control" id="date" name="enddate" placeholder="Order Date" type="text"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        

                <div class="col">
                 
                 <div class="form-group">

                    <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-cart"></i></span>
                                    </div>
                    <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="customers" >
                         <option hidden value="" >Select Customer</option>
                      @foreach($customers as $item)

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
                </div>
                <div class="col">
                 <div class="form-group">
                    <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-delivery-fast"></i></span>
                                    </div>
                    <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="distributors"  >
                         <option hidden value="">Select Distributor</option>
                      @foreach($distributors as $item)

                      <option value="{{ $item->distributor }}">{{ $item->distributor }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('distributors'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('distributors') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        <div class="col">
            <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-settings-gear-65"></i></span>
                                    </div>
                    <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="status" >
                         <option hidden value="" >Select Status</option>
                      <option value="open">Open</option>
                      <option value="closed">Closed</option>
                    </select>
                    @if ($errors->has('search'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('search') }}</strong>
                        </span>
                    @endif
                </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success mt-4">{{ __(' Create Report ') }}</button>
		   
            
        </form>

				</div>
				</div>
				</div>
				</div>
				</div>
    </div>
</div>
</div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-success" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        
@endsection