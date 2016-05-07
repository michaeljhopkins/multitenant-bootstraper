<div class="form-group {!! $errors->has('client_id') ? 'has-error' : '' !!}">
	{!! Form::label('client_id', 'Client Id', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
    	{!! Form::number('client_id', null, ['class' => 'form-control']) !!}
    	{!! $errors->first('client_id', '<small class="help-block">:message</small>') !!}
    </div>
</div>


<div class="form-group {!! $errors->has('tenant_id') ? 'has-error' : '' !!}">
	{!! Form::label('tenant_id', 'Tenant Id', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
    	{!! Form::number('tenant_id', null, ['class' => 'form-control']) !!}
    	{!! $errors->first('tenant_id', '<small class="help-block">:message</small>') !!}
    </div>
</div>


<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
	{!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
    	{!! Form::text('name', null, ['class' => 'form-control']) !!}
    	{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
    </div>
</div>


<div class="form-group {!! $errors->has('price') ? 'has-error' : '' !!}">
	{!! Form::label('price', 'Price', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
    	{!! Form::text('price', null, ['class' => 'form-control']) !!}
    	{!! $errors->first('price', '<small class="help-block">:message</small>') !!}
    </div>
</div>


<div class="form-group {!! $errors->has('recurring') ? 'has-error' : '' !!}">
	{!! Form::label('recurring', 'Recurring', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
    	{!! Form::number('recurring', null, ['class' => 'form-control']) !!}
    	{!! $errors->first('recurring', '<small class="help-block">:message</small>') !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
