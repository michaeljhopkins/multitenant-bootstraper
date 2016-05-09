@extends('layouts.main')
@section('main')
    <div class="row">
        <div class="page-header">
            <h1>Add your streak API token</h1>
        </div>
    </div>
    <div class="row">
        {!! \BootForm::open() !!}
            {!! \BootForm::text('token','Streak API Token',\Request::old('token',\Auth::user()->token)) !!}
            {!! \BootForm::submit('Update') !!}
        {!! \BootForm::close() !!}
    </div>
@stop
