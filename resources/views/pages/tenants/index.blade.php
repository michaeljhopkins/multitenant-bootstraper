@extends('app')

@section('content')
<div class="container">
    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Tenants</h1>
        {!! link_to_route('tenants.create', 'Add New', [], ['class' => 'btn btn-primary pull-right', 'style' => 'margin-top: 25px']) !!}
    </div>

    <div class="row">
    @if($tenants->isEmpty())
        <div class="well text-center">No Tenants found.</div>
    @else
        <table class="table">
            <thead>
                <th>Client Id</th>
				<th>Name</th>
				<th>Url</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($tenants as $tenant)
                <tr>
                    <td>{!! $tenant->client_id !!}</td>
					<td>{!! $tenant->name !!}</td>
					<td>{!! $tenant->url !!}</td>
                    <td>
                        {!! link_to_route('tenants.edit', 'Edit', [$tenant->id], ['class' => 'btn btn-primary pull-left']) !!}
                        {!! Form::open([
                            'route' => ['tenants.destroy', $tenant->id],
                            'method' => 'DELETE',
                            'onSubmit' => "return confirm('Are you sure wants to delete this Tenant?')",
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

    @include('common.paginate', ['records' => $tenants])
</div>
@endsection