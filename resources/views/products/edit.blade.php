@extends('adminlte::page')

@section('title', 'Products Management System | Edit')

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
                            update product
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" class="mt-3" action="{{ route('productsAdmin.update',$product->slug) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="title" class="form-label fw-bold">Title</label>
                                <input type="text" name="title" value="{{old('title',$product->title)}}" placeholder="title" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="slug">Slug </label>
                                <input type="text" name="slug" value="{{old("slug",$product->slug)}}"  placeholder="slug " class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="description">Description</label>
                                <input type="text" class="form-control" value="{{old("description",$product->description)}}"  name="description" placeholder="description">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="price">price</label>
                                <input type="number" class="form-control" value="{{old("price",$product->price)}}"  placeholder="price" name="price">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="inStock">inStock</label>
                                <input type="number" class="form-control" value="{{old("inStock",$product->inStock)}}"  placeholder="inStock" name="inStock">
                            </div>
                        
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="category_id">category_id</label>
                                <input type="number" class="form-control" value="{{old("category_id",$product->category_id)}}"  placeholder="category_id" name="category_id">
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