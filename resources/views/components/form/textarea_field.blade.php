
@if(in_array('required', $attributes) !== false)
    <div class="form-group  {{ $errors->has($name) ? 'has-error' : '' }}">
        {{ Form::label($label ? $label : $name, null, ['class' => 'control-label']) }}<span class="required_field"></span>
        {!! $errors->first($name, '<br/><small class="help-block">:message</small>') !!}
        {{ Form::textarea($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
    </div>
@else
    <div class="form-group  {{ $errors->has($name) ? 'has-error' : '' }}">
        {{ Form::label($label ? $label : $name, null, ['class' => 'control-label']) }}
        {!! $errors->first($name, '<br/><small class="help-block">:message</small>') !!}
        {{ Form::textarea($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
    </div>
@endif