 @extends('layouts.app', ['class' => 'bg-primary'])

@section('content')
<div class="header bg-gradient-dark py-7 py-lg-8">
        <div class="container">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">Recently Stocked Products</h1>
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
                            <th scope="col">
                                 @sortablelink('all_time_purchase_value','All time sold units')
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
                      
                            <a class="dropdown-item" href="#add_stock" class="open-add_stock" data-toggle="modal" data-productid="{{ $row->productid }}">Add Stock</a> 
                            <a class="dropdown-item" href="/deleteProduct?productid=<?php echo $row->productid ?>">Delete Product</a>
                         
                        </div>
                   </td>
                    <td>{{$row['productid']}}</td>
                    <td> {{$row['product_name']}}</td>
                    <td> {{$row['date_of_stocking']}}</td>
                    <td> {{$row['active_stock']}}</td>
                    <td> {{$row['all_time_purchase_value']}}</td>
                    
                   
                </tr>
                @endforeach
            </tbody>
                </table>
            

        </div>
    </div>
    
</div>


<!-- Modal -->
<div class="modal fade" id="add_stock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Stock more product units</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        

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
 <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
<script>

$(document).ready(function()
{
     var infoModal = $('#add_stock');    
    $('#add_stock').on('show.bs.modal', function (e) 
    {        
        var productid = $(e.relatedTarget).data('productid');       
        $.ajax(
        {            
            type: "GET",
            url: "getProduct",
            async: false,
            data: "productid=" + productid,
            dataType: 'json',
            success: function(result) {
                        console.log(result);
                            htmlData = 
                            '<form role="form" method="GET" action="{{ route('updateStock') }}">'+ 
                        '@csrf' + 
                        '<div><div><div class="text-center text-muted mb-4"><span><i class="ni ni-box-2 text-primary"></i> Product ID <i class="text-primary">—</i>'+ result.productid+'</span></div></div>' +
                                    '<input type="hidden" name="productid" value="'+ result.productid +'"/>' +'<div class="form-group">' +
                                '<div class="input-group input-group-alternative">'+
                                    '<div class="input-group-prepend">'+
                                        '<span class="input-group-text"><i class="ni ni-archive-2"></i></span>'+
                                    '</div>' + 
                                    
                                    '<input class="form-control" name="units" placeholder="Add More Units" type="text" required autofocus/>'+
                                '</div></div>'+

                            '<button type="submit" class="btn btn-success mt-4">{{ __('Add Stock') }}</button></form>';
            infoModal.find('.modal-body').html(htmlData);
            infoModal.modal('show');
                    },
            error   : function(result) 
                    { 
                        alert('error'+result); 
                    }
        });     
    });
});
 // For editting data in modal popup with Dynamic ID passing close----------->
</script>