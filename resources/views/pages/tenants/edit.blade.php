@extends('app')

@section('content')
<div class="container">

    @include('flash::message')

    {!! Form::model($tenant, ['route' => ['tenants.update', $tenant->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}

        @include('tenants.form')

    {!! Form::close() !!}
</div>
@endsection
