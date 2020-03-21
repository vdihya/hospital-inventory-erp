@extends('layouts.app', ['class' => 'bg-primary'])

@section('content')
<div class="header bg-gradient-dark py-7 py-lg-8">
        <div class="container">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">Report </h1>
                    </div>
                
        </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">

                    <h1>{{ $chart->options['chart_title'] }}</h1>
                    {!! $chart->renderHtml() !!}

                <hr />

                  

                </div>

            </div>
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
@push('js')
{!! $chart->renderChartJsLibrary() !!}

{!! $chart->renderJs() !!}
@endpush