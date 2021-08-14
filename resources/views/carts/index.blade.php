@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <h3>My Cart</h3>
        </div>

        <div class="row">
            <table class="table">
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
                                <div class="form-group">
                                    <label for="quantity">Quantity in {{ $cart->crop->unit }}</label>
                                    <input type="number" class="form-control" name="quantity" id="quantity"
                                        placeholder="Quantity" value="{{ old('quantity', $cart->quantity) }}">
                                    <button type="submit" class="btn btn-success d-inline"><i class="fa fa-check"
                                            aria-hidden="true"></i></button>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success">Proceed</button>
            </div>
        </div>

    </div>

@endsection
