@extends('adminlte::page')

@section('title', 'Employes Management System | '.$order->product_name)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header bg-white text-center p-3">
                    <h3 class="text-dark">
                        order receipt 
                    </h3>
                    <p class="lead">
                        created At :<b>{{$order->created_at}}</b>
                    </p>
                </div>
                <div class="card-body">
                    <p class="lead">
                        your order containt this product :<b>{{$order->product_name}}</b>
                    </p>
                    <p class="lead">
                        with this quantity : <b>{{$order->qty}}</b> 
                    </p>
                    <p class="lead">
                        this is the price for each product : <b>{{$order->price}}</b> DH
                    </p>
                    <p class="lead">
                        And this is the total : <b> {{$order->total}}</b> DH
                    </p>

                    <p class="m-5">
                        Signature
                        ___________
                    </p>
                    <a href="#" id="printPageButton" class="btn btn-sm btn-primary mb-3" onclick="document.getElementById('printPageButton').style.display = 'none';
                        window.print();" class="btn btn-md btn-primary mr-2 mb-2">
                        <i class="fas fa-print"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection