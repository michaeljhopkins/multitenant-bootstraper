@extends('layouts.app')
    @section('main')

        <div class="row">
            <div class="page-header">
                Profile
            </div>
        </div>
        <div class="row">
            {!! \BootForm::open() !!}
            {!! \BootForm::text('first_name','First Name: ',\Auth::user()->first_name) !!}
            {!! \BootForm::text('last_name','Last Name: ',\Auth::user()->last_name) !!}
            {!! \BootForm::text('email','Email: ',\Auth::user()->email) !!}
            {!! \BootForm::text('token','Streak API Token: ',\Auth::user()->token) !!}
            {!! \BootForm::submit('Update') !!}
            {!! \BootForm::close() !!}
        </div>

    @stop
