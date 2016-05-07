@extends('app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::model($permission, ['route' => ['permissions.update', $permission->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}

        @include('permissions.form')

    {!! Form::close() !!}
</div>
@endsection
