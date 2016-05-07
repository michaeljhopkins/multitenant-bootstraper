@extends('app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::open(['route' => 'roles.store', 'class' => 'form-horizontal']) !!}

        @include('roles.form')

    {!! Form::close() !!}
</div>
@endsection
