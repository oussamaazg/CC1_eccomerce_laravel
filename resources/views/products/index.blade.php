@extends('adminlte::page')


@section('title','List of Products')
@section('content_header')
    <h1>List of Products</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="row my-5">
                <div class="col-md-6 mx-auto">
                    @include('layouts.alerts')
                </div>
            </div>
            <div class="card my-3">
                <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                            <h4>Products</h4>
                        </div>
                </div>
                <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>description</th>
                                    <th>Price</th>
                                    <th>inStock</th>
                                    <th>category_id</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td>{{$key+=1}}</td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->slug}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->inStock}}</td>
                                        <td>{{$product->category_id}}</td>
                                        
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{route("productsAdmin.show",$product->slug)}}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{route("productsAdmin.edit",$product->slug)}}"
                                                class="btn btn-sm btn-warning mx-2">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <form  id="{{$product->slug}}" action="{{route("productsAdmin.destroy",$product->slug)}}"
                                                method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit"
                                                
                                                 class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js">
        $(document).ready( function () {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'csv', 'pdf', 'print',
                ]
            });
        });
    </script>
    @if(session()->has("success"))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "{{session()->get('success')}}",
            showConfirmButton: false,
            timer: 2500
        });
    </script>
    @endif
    <script>
        function deletePr(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
       
         cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(id).submit(); // submit the form with the given ID
        
                }
                })
            }
    </script>
@endsection 