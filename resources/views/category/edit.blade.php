@extends('adminlte::page')

@section('title', 'category Management System | Edit')

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
                            update category
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" class="mt-3" action="{{ route('category.update',$category->slug) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="title" class="form-label fw-bold">Title</label>
                                <input type="text" name="title" value="{{old('title',$category->title)}}" placeholder="title" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="slug">Slug </label>
                                <input type="text" name="slug" value="{{old("slug",$category->slug)}}"  placeholder="slug " class="form-control">
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