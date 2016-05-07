@extends('app')

@section('content')
<div class="container">
    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Orders</h1>
        {!! link_to_route('orders.create', 'Add New', [], ['class' => 'btn btn-primary pull-right', 'style' => 'margin-top: 25px']) !!}
    </div>

    <div class="row">
    @if($orders->isEmpty())
        <div class="well text-center">No Orders found.</div>
    @else
        <table class="table">
            <thead>
                <th>Client Id</th>
				<th>Tenant Id</th>
				<th>Total</th>
				<th>User Id</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{!! $order->client_id !!}</td>
					<td>{!! $order->tenant_id !!}</td>
					<td>{!! $order->total !!}</td>
					<td>{!! $order->user_id !!}</td>
                    <td>
                        {!! link_to_route('orders.edit', 'Edit', [$order->id], ['class' => 'btn btn-primary pull-left']) !!}
                        {!! Form::open([
                            'route' => ['orders.destroy', $order->id],
                            'method' => 'DELETE',
                            'onSubmit' => "return confirm('Are you sure wants to delete this Order?')",
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

    @include('common.paginate', ['records' => $orders])
</div>
@endsection