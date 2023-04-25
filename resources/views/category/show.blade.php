@extends('adminlte::page')

@section('title', 'category Management System | '.$category->slug)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header bg-white text-center p-3">
                    <h3 class="text-dark">
                        categories 
                    </h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="id" class="form-label fw-bold">id</label>
                        <div class="border border-secondary rounded p-2">
                            {{$category->id}}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="title" class="form-label fw-bold">title</label>
                        <div class="border border-secondary rounded p-2">
                            {{$category->title}}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="slug" class="form-label fw-bold">slug</label>
                        <div class="border border-secondary rounded p-2">
                            {{$category->slug}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection