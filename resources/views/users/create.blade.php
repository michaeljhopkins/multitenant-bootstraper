@extends('app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::open(['route' => 'users.store', 'class' => 'form-horizontal']) !!}

        @include('users.form')

    {!! Form::close() !!}
</div>
@endsection
