@extends('app')

@section('content')
<div class="container">
    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Clients</h1>
        {!! link_to_route('clients.create', 'Add New', [], ['class' => 'btn btn-primary pull-right', 'style' => 'margin-top: 25px']) !!}
    </div>

    <div class="row">
    @if($clients->isEmpty())
        <div class="well text-center">No Clients found.</div>
    @else
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>{!! $client->name !!}</td>
                    <td>
                        {!! link_to_route('clients.edit', 'Edit', [$client->id], ['class' => 'btn btn-primary pull-left']) !!}
                        {!! Form::open([
                            'route' => ['clients.destroy', $client->id],
                            'method' => 'DELETE',
                            'onSubmit' => "return confirm('Are you sure wants to delete this Client?')",
                        ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'style' => 'margin-left:10px']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    </div>

    @include('common.paginate', ['records' => $clients])
</div>
@endsection