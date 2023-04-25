@extends('adminlte::page')

@section('title', 'Orders Management System | '.$user->email)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header bg-white text-center p-3">
                    <h3 class="text-dark">
                        user : {{$user->name}}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="email" class="form-label fw-bold">email</label>
                        <div class="border border-secondary rounded p-2">
                            {{$user->email}}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name" class="form-label fw-bold">name</label>
                        <div class="border border-secondary rounded p-2">
                            {{$user->name}}
                        </div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="adresse" class="form-label fw-bold">adresse</label>
                        <div class="border border-secondary rounded p-2">
                            {{$user->adresse}}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="city" class="form-label fw-bold">city </label>
                        <div class="border border-secondary rounded p-2">
                            {{$user->city}}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="country" class="form-label fw-bold">country</label>
                        <div class="border border-secondary rounded p-2">
                            {{$user->country}}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="telephone" class="form-label fw-bold">telephone</label>
                        <div class="border border-secondary rounded p-2">
                            {{$user->telephone}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection