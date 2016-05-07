@extends('app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::open(['route' => 'permissions.store', 'class' => 'form-horizontal']) !!}

        @include('permissions.form')

    {!! Form::close() !!}
</div>
@endsection
