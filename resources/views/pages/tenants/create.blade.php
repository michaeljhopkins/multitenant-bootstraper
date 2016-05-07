@extends('app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::open(['route' => 'tenants.store', 'class' => 'form-horizontal']) !!}

        @include('tenants.form')

    {!! Form::close() !!}
</div>
@endsection
