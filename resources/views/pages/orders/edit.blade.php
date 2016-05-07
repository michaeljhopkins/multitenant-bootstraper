@extends('app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::model($order, ['route' => ['orders.update', $order->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}

        @include('orders.form')

    {!! Form::close() !!}
</div>
@endsection
