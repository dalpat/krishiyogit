@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <img src="{{ asset('storage/' . $crop->photo) }}" alt="" class="img-thumbnail">
            </div>

            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $crop->title }}</h4>
                        <p class="card-text"><i class="fa fa-inr" aria-hidden="true"></i>
                            {{ $crop->price . '/' . $crop->unit }}</p>
                            <p class="card-text">Farmer: {{ $crop->farmer->name }}</p>
                        <button type="button" class="btn btn-primary">Buy Now</button> <br>
                        <a href="#details" class="btn btn-link">View details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4 p-4 bg-white">
            <div class="col-12">
                <h1 id="details">Product Description</h1>
                <p>
                    {{ $crop->description }}
                </p>
                <p>Provided by: {{ $crop->farmer->name }}</p>
            </div>
        </div>
    </div>




@endsection
