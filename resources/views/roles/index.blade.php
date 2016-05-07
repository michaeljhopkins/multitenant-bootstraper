@extends('app')

@section('content')
<div class="container">
    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Roles</h1>
        {!! link_to_route('roles.create', 'Add New', [], ['class' => 'btn btn-primary pull-right', 'style' => 'margin-top: 25px']) !!}
    </div>

    <div class="row">
    @if($roles->isEmpty())
        <div class="well text-center">No Roles found.</div>
    @else
        <table class="table">
            <thead>
                <th>Client Id</th>
				<th>Tenant Id</th>
				<th>Name</th>
				<th>Slug</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{!! $role->client_id !!}</td>
					<td>{!! $role->tenant_id !!}</td>
					<td>{!! $role->name !!}</td>
					<td>{!! $role->slug !!}</td>
                    <td>
                        {!! link_to_route('roles.edit', 'Edit', [$role->id], ['class' => 'btn btn-primary pull-left']) !!}
                        {!! Form::open([
                            'route' => ['roles.destroy', $role->id],
                            'method' => 'DELETE',
                            'onSubmit' => "return confirm('Are you sure wants to delete this Role?')",
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

    @include('common.paginate', ['records' => $roles])
</div>
@endsection