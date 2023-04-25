@extends('adminlte::page')

@section('title', 'users Management System | Edit')

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
                            update user
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" class="mt-3" action="{{ route('users.update',$user->email) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="email" class="form-label fw-bold">email</label>
                                <input type="text" name="email" value="{{old('email',$user->email)}}" placeholder="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="name">name </label>
                                <input type="text" name="name" value="{{old("name",$user->name)}}"  placeholder="name " class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="adresse">adresse</label>
                                <input type="text" class="form-control" value="{{old("adresse",$user->adresse)}}"  name="adresse" placeholder="adresse">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="city">city</label>
                                <input type="text" class="form-control" value="{{old("total",$user->city)}}"  placeholder="city" name="city">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="country">country</label>
                                <input type="text" class="form-control" value="{{old("country",$user->country)}}"  placeholder="country" name="country">
                            </div>
                        
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="telephone">telephone</label>
                                <input type="number" class="form-control" value="{{old("telephone",$user->telephone)}}"  placeholder="telephone" name="telephone">
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