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


<div class="form-group {!! $errors->has('total') ? 'has-error' : '' !!}">
	{!! Form::label('total', 'Total', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
    	{!! Form::text('total', null, ['class' => 'form-control']) !!}
    	{!! $errors->first('total', '<small class="help-block">:message</small>') !!}
    </div>
</div>


<div class="form-group {!! $errors->has('user_id') ? 'has-error' : '' !!}">
	{!! Form::label('user_id', 'User Id', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
    	{!! Form::number('user_id', null, ['class' => 'form-control']) !!}
    	{!! $errors->first('user_id', '<small class="help-block">:message</small>') !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
