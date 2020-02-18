@extends('layouts.app', ['class' => 'bg-primary'])

@section('content')
<div class="header bg-gradient-dark py-7 py-lg-8">
        <div class="container">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">Recent Purchase orders</h1>
                    </div>
                
        </div>
        <div class="container">
        <form action="/search" method="POST" role="search">
                @csrf
                
            <div class="row">
                <div class="col">
                <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    </div>
                                    <input class="form-control" name="search" placeholder="Search" type="text" onchange="this.form.submit()"/>
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
                               <input class="form-control" id="date" name="enddate" placeholder="Order Date" type="text"  onchange='this.form.submit()'/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col">
                 
                 <div class="form-group">

                    <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-cart"></i></span>
                                    </div>
                    <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="customers" onchange='this.form.submit()' >
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
                    <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="distributors" onchange='this.form.submit()' >
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
        </div>
        <div class="col">
            <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-settings-gear-65"></i></span>
                                    </div>
                    <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="status" onchange='this.form.submit()'>
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
            
        </form>
    </div>

        

        <div class="container col-md-12">
            <div class="table-static">
                <table class="table align-items-center table-light">
                    <thead class="thead-light">
                        <tr>
                            <th scope ="col">
                                Options
                            </th>
                             <th scope="col">
                               @sortablelink('date','Order Date')
                            </th>
                            <th scope="col">
                               @sortablelink('ordno','PO no.') 
                            </th>
                            <th scope="col">
                               @sortablelink('bolno','BOL No.')  
                            </th>
                            <th scope="col">
                                 @sortablelink('invoiceno',' Invoice No.')
                            </th>
                            <th scope="col">
                                @sortablelink('customer','Customer')
                            </th>
                            <th scope="col">
                                @sortablelink('distributor','Distributor') 
                            </th>
                            <th scope="col">
                               @sortablelink('soldto','Sold To')  
                            </th>
                            <th scope="col">
                               @sortablelink('status','Status')   
                            </th>
                            <th scope="col">
                              @sortablelink('type','Type')    
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody class="list" >
            
                    @foreach($orders as $row)
            
                <tr>
                     <td>
                        <div class="btn-group">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                          <div class="dropdown-menu">
                            <div class="dropdown-item bg-gradient-primary">

                                <span>Added by</span>
                                <i class="ni ni-single-02"><b> {{$row->added_by}}</b></i>
                                

                            </div>
                            <a class="dropdown-item bg-gradient-danger" href="/close_order?ordno=<?php echo $row->ordno ?>">Close Order</a>
                         
                        </div>
                   </td>
                    <td class="date"> {{$row['date']}}</td>
                    <td><b> {{$row['ordno']}}<b></td>
                    <td> {{$row['bolno']}}</td>
                    <td> {{$row['invoiceno']}}</td>
                    <td> {{$row['customer']}}</td>
                    <td> {{$row['distributor']}}</td>
                    <td> {{$row['soldto']}}</td>
                    @if($row->status =='open')

                    <td><span class="badge badge-dot mr-4">
                      <i class="bg-success"></i>
                     {{$row['status']}}
                    </span> </td>

                    @elseif($row->status =='closed')
                    <td><span class="badge badge-dot mr-4">
                      <i class="bg-danger"></i>
                     {{$row['status']}}
                    </span> </td>
                    @endif

                    <td> {{$row['type']}}</td>
                    

                   
                </tr>
                @endforeach
            </tbody>
                </table>
            

        </div>
    </div>
    <div class="container">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-dark"><a href="/purchases">View original data</a></button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-dark"><a href="/pdf">Export into PDF</a></button>
        </div>
         <div class="col">
            <button type="button" class="btn btn-dark"><a href="/purchases">Export into excel</a></button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-dark"><a href="/purchases">Export into csv</a></button>
        </div>
        
        
    </div>
</div>
</div>

        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-primary" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        
@endsection