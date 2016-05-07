@extends('app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}

        @include('users.form')

    {!! Form::close() !!}
</div>
@endsection
