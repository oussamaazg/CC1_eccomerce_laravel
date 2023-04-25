@extends('adminlte::page')

@section('title', 'orders Management System | Edit')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
                <div class="row my-5">
                    <div class="col-md-6 mx-auto">
                        @include('layouts.alerts')
                    </div>
                </div>
                <div class="card my-5">
                    <div class="card-header bg-white text-center p-3">
                        <h3 class="text-dark">
                            update order
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" class="mt-3" action="{{ route('orders.update',$order->product_name) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="product_name" class="form-label fw-bold">product_name</label>
                                <input type="text" name="product_name" value="{{old('product_name',$order->product_name)}}" placeholder="product_name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="qty">quantity </label>
                                <input type="text" name="qty" value="{{old("qty",$order->qty)}}"  placeholder="qty " class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="price">price</label>
                                <input type="number" class="form-control" value="{{old("price",$order->price)}}"  name="price" placeholder="price">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="total">total</label>
                                <input type="number" class="form-control" value="{{old("total",$order->total)}}"  placeholder="total" name="total">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="paid">paid</label>
                                <input type="number" class="form-control" value="{{old("paid",$order->paid)}}"  placeholder="paid" name="paid">
                            </div>
                        
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="delivered">delivered</label>
                                <input type="number" class="form-control" value="{{old("delivered",$order->delivered)}}"  placeholder="delivered" name="delivered">
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            
        </div>
    </div>
</div>
@endsection