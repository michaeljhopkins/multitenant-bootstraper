@extends('layouts.main')
@section('main')
    <div class="row">
        <div class="page-header">
            <h1>Select Boxes to Export</h1>
        </div>
    </div>
    {!! \BootForm::open() !!}
    {!! \BootForm::checkboxes('boxes[]','Pick Boxes to Export',$boxes) !!}
    {!! \BootForm::submit() !!}
    {!! \BootForm::close() !!}
@stop
