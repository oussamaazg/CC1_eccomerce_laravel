@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('title','List of Orders')
@section('content_header')
    <h1>List of Orders</h1>
@stop

@section('content')
    <div class="container">
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
                            <h4>Orders</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>product_name</th>
                                    <th>qty</th>
                                    <th>Price</th>
                                    <th>total</th>
                                    <th>Paid</th>
                                    <th>Delivered</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td>{{$key+=1}}</td>
                                        <td>{{$order->product_name}}</td>
                                        <td>{{$order->qty}}</td>
                                        <td>{{$order->price}}</td>
                                        <td>{{$order->total}}</td>
                                        <td>{{$order->paid}}</td>
                                        <td>{{$order->delivered}}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{route("orders.show",$order->product_name)}}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{route("orders.edit",$order->product_name)}}"
                                                class="btn btn-sm btn-warning mx-2">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <form  id="{{$order->product_name}}" action="{{route("orders.destroy",$order->product_name)}}"
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
    </div>



@endsection
@section('js')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'
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
