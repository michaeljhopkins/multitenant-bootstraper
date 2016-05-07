@extends('app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::model($client, ['route' => ['clients.update', $client->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}

        @include('clients.form')

    {!! Form::close() !!}
</div>
@endsection
