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
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Created At</th>
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
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection()