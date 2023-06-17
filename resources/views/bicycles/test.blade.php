@php
    use App\Http\Controllers\BicycleController;
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    @foreach ($bicycles as $bicycle)
                        @if($bicycle->id == $id)
                            @php
                                $bike = new BicycleController($bicycle->color,$bicycle->type, $bicycle->speed);
                            @endphp
                            <h1 class="card-header" style="text-align: center">
                                <b>{{ __($bicycle->color. ' | ' . $bicycle->type . ' | ' . $bicycle->speed) }}</b>
                            </h1>
                            <div class="card-header" style="background:{{$bicycle->color}}">
                            </div>
                            <div class="card-body" style="text-align: center">
                                <h2>Additional Bike Details:</h2>
                                <ul style="font-size:20px; text-align: left">
                                    <li>In Stock: <b>{{$bike->calculateStock()}}</b></li>
                                    <li>Top MPH: <b>{{$bike->calculateTopMPH()}}</b></li>
                                    <li>Price: <b>${{$bike->calculatePrice()}}</b></li>
                                </ul>
                                <button class="btn btn-primary" id=bike{{$bicycle->id}} onclick="window.location='{{ url("/") }}'">Return to Bike List</button>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
