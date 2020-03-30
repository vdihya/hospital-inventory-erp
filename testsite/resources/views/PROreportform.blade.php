@extends('layouts.app', ['class' => 'bg-primary'])

@section('content')

   <div class="header bg-gradient-dark py-7 py-lg-8">
        <div class="container">

        	
                <div class="row justify-content-center">
                <h1 class="text-white">Product Report</h1>
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




        <form action="/PROpdf" method="get" role="PROpdf">
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
                    <div class="row">
                    <div class="col">
                    <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                        </div>
                                        <input class="form-control" name="activestart" placeholder="Stock more than" type="number"/>
                                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                        </div>
                                        <input class="form-control" name="activeend" placeholder="Stock less than" type="number"/>
                                    </div>
                    </div>
                </div>
            </div>
                </div>
                 <div class="col">
                    <div class="row">
                    <div class="col">
                    <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                        </div>
                                        <input class="form-control" name="alltimestart" placeholder="Total purchases >" type="number"/>
                                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                        </div>
                                        <input class="form-control" name="alltimeend" placeholder="Total purchases < " type="number"/>
                                    </div>
                    </div>
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