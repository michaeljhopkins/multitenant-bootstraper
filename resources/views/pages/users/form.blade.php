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


<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
	{!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
    	{!! Form::text('email', null, ['class' => 'form-control']) !!}
    	{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
    </div>
</div>


<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
	{!! Form::label('password', 'Password', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
    	{!! Form::text('password', null, ['class' => 'form-control']) !!}
    	{!! $errors->first('password', '<small class="help-block">:message</small>') !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
