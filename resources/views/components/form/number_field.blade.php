@if(in_array('required', $attributes) !== false)
    <div class="form-group  {{ $errors->has($name) ? 'has-error' : '' }}">
        {{ Form::label($label, null, ['class' => 'control-label']) }}<span class="required_field"></span>
        {{ Form::number($name, $value, array_merge(['class' => 'form-control'], $attributes?:[])) }}
        {!! $errors->first($name, '<small class="help-block">:message</small>') !!}
    </div>
@else
    <div class="form-group  {{ $errors->has($name) ? 'has-error' : '' }}">
        {{ Form::label($label, null, ['class' => 'control-label']) }}
        {{ Form::number($name, $value, array_merge(['class' => 'form-control'], $attributes?:[])) }}
        {!! $errors->first($name, '<small class="help-block">:message</small>') !!}
    </div>
@endif
