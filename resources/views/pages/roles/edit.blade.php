@extends('app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}

        @include('roles.form')

    {!! Form::close() !!}
</div>
@endsection
