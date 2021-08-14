@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">.
            <div class="col-12">
                <h3>My Cart</h3>
            </div>
        </div>



        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Success</strong> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>!</strong> {{ session('error') }}
            </div>
        @endif

        <div class="row">
            <div class="col-12 col-md-6">

                <table class="table table-light table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                            <tr>
                                <td scope="row">{{ $cart->crop->title }}</td>
                                <td>
                                    <form action="{{ route('carts.update', $cart->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <label for="quantity">Quantity in {{ $cart->crop->unit }}</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="quantity" id="quantity"
                                                placeholder="Quantity" value="{{ old('quantity', $cart->quantity) }}">
                                            <button type="submit" class="btn btn-success d-inline input-group-addon"><i
                                                    class="fa fa-check" aria-hidden="true"></i></button>
                                        </div>
                                    </form>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Cart Summery</h4>
                        <p class="card-text">{{ count($carts) }} items</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Bill: <i class="fa fa-inr" aria-hidden="true"></i></li>
                        <li class="list-group-item">Total: <i class="fa fa-inr" aria-hidden="true"></i></li>
                    </ul>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Proceed</button>
            </div>


        </div>

    </div>

@endsection
