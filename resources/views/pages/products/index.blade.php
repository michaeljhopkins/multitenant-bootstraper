@extends('layouts.main')

@section('main')
<div class="container">
    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Products</h1>
        {!! link_to_route('products.create', 'Add New', [], ['class' => 'btn btn-primary pull-right', 'style' => 'margin-top: 25px']) !!}
    </div>

    <div class="row">
    @if($products->isEmpty())
        <div class="well text-center">No Products found.</div>
    @else
        <table class="table">
            <thead>
                <th>Client Id</th>
				<th>Tenant Id</th>
				<th>Name</th>
				<th>Price</th>
				<th>Recurring</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{!! $product->client_id !!}</td>
					<td>{!! $product->tenant_id !!}</td>
					<td>{!! $product->name !!}</td>
					<td>{!! $product->price !!}</td>
					<td>{!! $product->recurring !!}</td>
                    <td>
                        {!! link_to_route('products.edit', 'Edit', [$product->id], ['class' => 'btn btn-primary pull-left']) !!}
                        {!! Form::open([
                            'route' => ['products.destroy', $product->id],
                            'method' => 'DELETE',
                            'onSubmit' => "return confirm('Are you sure wants to delete this Product?')",
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

    @include('common.paginate', ['records' => $products])
</div>
@endsection