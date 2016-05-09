@extends('layouts.main')
@section('main')
    <div class="row">
        <div class="page-header">
            <h1>Available Pipelines</h1>
        </div>
    </div>
    <div class="row">
        <table class="table table-responsive">
            <thead>
                <th></th>
                <th>Name</th>
            </thead>
            <tbody>
                @foreach($pipelines as $pipeline)
                    <tr>
                        <td>
                            <a href="/pipelines/{!! $pipeline['key'] !!}/boxes">View</a>
                        </td>
                        <td>
                            {!! $pipeline['name'] !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
