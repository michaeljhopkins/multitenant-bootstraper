@extends('app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}

        @include('products.form')

    {!! Form::close() !!}
</div>
@endsection
