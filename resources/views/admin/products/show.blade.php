@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-5">
        <h2>Show Product</h2>

        <div class="row">
            <div class="col-md-10">
                {{$product->name}}
            </div>
        </div>

    </main>

@endsection()