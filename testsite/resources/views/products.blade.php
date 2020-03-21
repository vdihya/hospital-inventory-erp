 @extends('layouts.app', ['class' => 'bg-primary'])

@section('content')
<div class="header bg-gradient-dark py-7 py-lg-8">
        <div class="container">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">Recent Purchase orders</h1>
                    </div>
                
        </div>


 <div class="container col-md-12">
            <div class="table-responsive">
                <table class="table align-items-center table-light">
                    <thead class="thead-light">
                        <tr>
                            <th scope ="col">
                                Options
                            </th>
                             <th scope="col">
                               @sortablelink('productid','Product ID')
                            </th>
                            <th scope="col">
                               @sortablelink('product_name','Product Name') 
                            </th>
                            <th scope="col">
                               @sortablelink('date_of_stocking','Date of Stocking')  
                            </th>
                            <th scope="col">
                                 @sortablelink('active_stock',' Active Stock')
                            </th>
                            
                            
                        </tr>
                    </thead>
                    <tbody class="list" >
            
                    @foreach($products as $row)
            
                <tr>
                     <td>
                        <div class="btn-group">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                          <div class="dropdown-menu">
                            <div class="dropdown-item">Delete</div>
                            <a class="dropdown-item" href="/editOrder?productid=<?php echo $row->productid ?>">Add Stock/Edit Order</a>
                         
                        </div>
                   </td>
                    <td>{{$row['productid']}}</td>
                    <td> {{$row['product_name']}}</td>
                    <td> {{$row['date_of_stocking']}}</td>
                    <td> {{$row['active_stock']}}</td>
                    
                   
                </tr>
                @endforeach
            </tbody>
                </table>
            

        </div>
    </div>
    
</div>

        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-primary" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        
@endsection