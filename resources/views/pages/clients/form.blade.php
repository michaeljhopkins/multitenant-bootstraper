<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
	{!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
    	{!! Form::text('name', null, ['class' => 'form-control']) !!}
    	{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
