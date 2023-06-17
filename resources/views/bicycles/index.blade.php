@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center" style="font-weight: bold; font-size: 30px">
                        Bicycle Inventory
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center" style="font-size: 20px">
                                <th>Color</th>
                                <th>Type</th>
                                <th>Speed</th>
                                <th class="col-md-3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($bicycles as $bicycle)
                                <tr class="text-center">
                                    <td>{{$bicycle->color}}</td>
                                    <td>{{$bicycle->type}}</td>
                                    <td>{{$bicycle->speed}}</td>
                                    <td>
                                        <button class="btn btn-primary" id=bike{{$bicycle->id}} onclick="window.location='{{ url("test/" . $bicycle->id) }}'">
                                            See More
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
