@extends('adminlte::page')

@section('title', 'Orders Management System | '.$order->product_name)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header bg-white text-center p-3">
                    <h3 class="text-dark">
                        Order : {{$order->product_name}}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <a href="{{route('order.receipt',$order->product_name)}}"
                                class="btn btn-outline-dark">
                                {{ __('order receipt') }}
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group mb-3">
                        <label for="product_name" class="form-label fw-bold">product_name</label>
                        <div class="border border-secondary rounded p-2">
                            {{$order->product_name}}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="qty" class="form-label fw-bold">quantity</label>
                        <div class="border border-secondary rounded p-2">
                            {{$order->qty}}
                        </div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="price" class="form-label fw-bold">price</label>
                        <div class="border border-secondary rounded p-2">
                            {{$order->price}}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="total" class="form-label fw-bold">total </label>
                        <div class="border border-secondary rounded p-2">
                            {{$order->total}}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="paid" class="form-label fw-bold">paid</label>
                        <div class="border border-secondary rounded p-2">
                            {{$order->paid}}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="delivered" class="form-label fw-bold">delivered</label>
                        <div class="border border-secondary rounded p-2">
                            {{$order->delivered}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection