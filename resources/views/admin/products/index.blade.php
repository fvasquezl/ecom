@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-8 ml-sm-auto col-lg-10 px-4 mt-5">
        <div class="row">
            <div class="col">
                <h2>Products List</h2>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#createProductModal">
                    Create Product
                </button>
            </div>

        </div>

        <div class="table-responsive">
            <table id="products-table" class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td><a href="{{$product->url}}">{{$product->name}}</a></td>
                        <td>{{$product->code}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{\Carbon\Carbon::parse($product->created_at)->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('admin.product.show',[$product->id,$product->slug])}}" class="btn btn-default" target="_blank">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{route('admin.products.edit', $product)}}"
                               class="btn btn-xs btn-info">
                                <i class="fas fa-pencil"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@stop
@push('styles')
    <!--Data Tables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush

@push('scripts')
    <!--Data Tables -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function(){
            $('#products-table').DataTable({
                'paging' :true,
                'lengthChange' :false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        });

    </script>
@endpush