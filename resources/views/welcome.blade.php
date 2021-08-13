@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row my-3 bg-light p-3 rounded">
            <div class="col-12">
                <div class="clearfix">
                    <div class="float-left">
                        Recently verified
                    </div>
                    <div class="float-right">
                        <a href="{{ route('crops.index') }}" class="btn btn-outline-primary">View All</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($crops as $crop)
            <div class="col-12 col-md-3">
                <div class="card h-100">
                    <img class="card-img-top w-100 img-fluid img-thumbnail p-4 border-0 rounded" src="{{ asset('storage/'.$crop->photo) }}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{ $crop->title }}</h4>
                        <p class="card-text">Price: <i class="fa fa-inr" aria-hidden="true"></i> {{ $crop->price }} / {{ $crop->unit }}</p>
                    </div>

                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{ route('crops.show', $crop->id) }}">View</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection
