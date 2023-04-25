@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header">{{$product->title}} </h3>
                    <div class="card-img-top" >
                        @foreach ($product->images as $image)
                            <img class="img-fluid w-100" src="{{ $image->url }}" alt="{{$product->title}}" >
                        @endforeach
                    </div>
                <div class="card-body">
                    <h5 class="card-title">
                        {{$product->title}}
                    </h5>
                    <p class="text-dark font-weight-bold">
                        Category : {{$product->category->title}}
                    </p>
                    <p class="d-flex flex-row justify-content-between align-items-center">
                        <span class="text-muted">
                            {{$product->price}} DH
                        </span>
                        <span class="text-danger">
                            <strike>
                                {{$product->old_price}} DH
                            </strike>
                        </span>
                    </p>
                    <p class="card-text">
                        Description : {{ $product->description }}
                    </p>
                    <p class="font-weight-bold">
                        @if ($product->inStock >0)
                            <span class="text-success">
                                Disponible
                            </span>
                        @else
                            <span class="text-danger">
                                Non Disponible
                            </span>
                        @endif
                    </p>
                </div>  
            </div>
        </div>
        <div class="col-md-4">
            <form action="{{ route('add_to_cart', $product) }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="number" class="form-control" aria-describedby="basic-addon2"
                        name="amount" value=1>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Add to
                            cart</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
