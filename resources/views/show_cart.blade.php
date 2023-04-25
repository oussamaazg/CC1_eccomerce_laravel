@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card p-3">
                <h4 class="text-dark">Your cart</h4>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                        @php
                        $total_price = 0;
                        @endphp

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>
                                            {{ $cart->product->title}}
                                        </td>
                                        <td>
                                            <form action="{{ route('update_cart', $cart) }}" method="post">
                                                @method('patch')
                                                @csrf
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" aria-describedby="basic-addon2"
                                                        name="amount" value={{ $cart->amount }}>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" type="submit">Update
                                                            amount</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                        <td> 
                                            {{ $cart->product_price}} DH
                                        </td>
                                        <td>
                                            {{ $cart->amount  * $cart->product_price}} DH
                                        </td>
                                        <td>
                                            <form action="{{ route('delete_cart', $cart) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                    $total_price += $cart->product->price * $cart->amount;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        @if($total_price > 0)
                            <div class="form-group">
                                <a href="{{ route("make.payment") }}" class="btn btn-primary mt-3">
                                    Pay {{ $total_price }} DH via PayPal
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection