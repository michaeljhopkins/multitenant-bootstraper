@extends('app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::open(['route' => 'clients.store', 'class' => 'form-horizontal']) !!}

        @include('clients.form')

    {!! Form::close() !!}
</div>
@endsection
