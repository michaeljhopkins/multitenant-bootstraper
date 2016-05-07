@extends('app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::open(['route' => 'products.store', 'class' => 'form-horizontal']) !!}

        @include('products.form')

    {!! Form::close() !!}
</div>
@endsection
