@extends('layouts.app', ['class' => 'bg-primary'])

@section('content')
<div class="header bg-gradient-dark py-7 py-lg-8">
        <div class="container">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">Saved Reports</h1>
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
                               @sortablelink('reportno','Report No.')   
                            </th>
                            <th scope="col">
                              @sortablelink('chart_title','Name of Report')    
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody class="list" >
            
                    @foreach($reports as $row)
            
                <tr>
               
                    <td>
                        <div class="btn-group">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                          <div class="dropdown-menu">
                            <div class="dropdown-item">Delete Report</div>
                            <a class="dropdown-item" href="/makeReport?reportno=<?php echo $row->reportno ?>">Generate Report</a>
                         
                        </div>
                   </td>
                    <td> {{$row['reportno']}}</td>
                    <td> {{$row['chart_title']}}</td>
                   
                    
                    

                   
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