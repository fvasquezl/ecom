@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-5">
        <h2>Edit Product</h2>

        <div class="row">
            <div class="col-md-7">
                {!! Form::model($product,['route' => ['admin.products.update',$product],'method'=>'PUT','files' => true]) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name',null,$attributes = $errors->has('name') ?  ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('code','Code') !!}
                    {!! Form::text('code', null, $attributes = $errors->has('code') ?  ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                    @if ($errors->has('code'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('code') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('description','Description') !!}
                    {!! Form::textArea('description', null,  $attributes = $errors->has('code') ?  ['class' => 'form-control is-invalid','rows'=>4] : ['class' => 'form-control','rows'=>4]) !!}
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Image') !!}
                    {!! Form::file('image', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Price', ['class' => 'control-label']) !!}
                    {!! Form::text('price', null,$attributes = $errors->has('price') ?  ['class' => 'form-control is-invalid',] : ['class' => 'form-control']) !!}
                    @if ($errors->has('price'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Submit Information
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </main>

@endsection()