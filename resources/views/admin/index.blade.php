@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{\App\Models\Product::count()}}</h3>
                    <p>Products</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{route('productsAdmin.index')}}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{\App\Models\Order::count()}}</h3>
                    <p>Orders</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{route('orders.index')}}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{\App\Models\Category::count()}}</h3>
                    <p>Categories</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{route('category.index')}}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{\App\Models\User::count()}}</h3>
                    <p>Clients</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{route('users.index')}}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>


@endsection
