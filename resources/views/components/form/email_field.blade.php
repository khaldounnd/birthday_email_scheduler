
@if(in_array('required', $attributes) !== false)
    <div class="form-group  {{ $errors->has($name) ? 'has-error' : '' }}">
        {{ Form::label($label, null, ['class' => 'control-label']) }}<span class="required_field"></span>
        {!! $errors->first($name, '<small class="help-block">:message</small>') !!}
        {{ Form::email($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
    </div>
@else
    <div class="form-group  {{ $errors->has($name) ? 'has-error' : '' }}">
        {{ Form::label($label, null, ['class' => 'control-label']) }}
        {!! $errors->first($name, '<small class="help-block">:message</small>') !!}
        {{ Form::email($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
    </div>
@endif