@extends('app')

@section('content')
<div class="container">
    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Permissions</h1>
        {!! link_to_route('permissions.create', 'Add New', [], ['class' => 'btn btn-primary pull-right', 'style' => 'margin-top: 25px']) !!}
    </div>

    <div class="row">
    @if($permissions->isEmpty())
        <div class="well text-center">No Permissions found.</div>
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
                @foreach($permissions as $permission)
                <tr>
                    <td>{!! $permission->client_id !!}</td>
					<td>{!! $permission->tenant_id !!}</td>
					<td>{!! $permission->name !!}</td>
					<td>{!! $permission->slug !!}</td>
                    <td>
                        {!! link_to_route('permissions.edit', 'Edit', [$permission->id], ['class' => 'btn btn-primary pull-left']) !!}
                        {!! Form::open([
                            'route' => ['permissions.destroy', $permission->id],
                            'method' => 'DELETE',
                            'onSubmit' => "return confirm('Are you sure wants to delete this Permission?')",
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

    @include('common.paginate', ['records' => $permissions])
</div>
@endsection