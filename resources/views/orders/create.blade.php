@extends('app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::open(['route' => 'orders.store', 'class' => 'form-horizontal']) !!}

        @include('orders.form')

    {!! Form::close() !!}
</div>
@endsection
