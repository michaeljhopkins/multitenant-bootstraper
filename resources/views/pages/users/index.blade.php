@extends('app')

@section('content')
<div class="container">
    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Users</h1>
        {!! link_to_route('users.create', 'Add New', [], ['class' => 'btn btn-primary pull-right', 'style' => 'margin-top: 25px']) !!}
    </div>

    <div class="row">
    @if($users->isEmpty())
        <div class="well text-center">No Users found.</div>
    @else
        <table class="table">
            <thead>
                <th>Client Id</th>
				<th>Tenant Id</th>
				<th>Email</th>
				<th>Password</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{!! $user->client_id !!}</td>
					<td>{!! $user->tenant_id !!}</td>
					<td>{!! $user->email !!}</td>
					<td>{!! $user->password !!}</td>
                    <td>
                        {!! link_to_route('users.edit', 'Edit', [$user->id], ['class' => 'btn btn-primary pull-left']) !!}
                        {!! Form::open([
                            'route' => ['users.destroy', $user->id],
                            'method' => 'DELETE',
                            'onSubmit' => "return confirm('Are you sure wants to delete this User?')",
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

    @include('common.paginate', ['records' => $users])
</div>
@endsection