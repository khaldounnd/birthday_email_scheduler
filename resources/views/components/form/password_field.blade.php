@if(in_array('required', $attributes) !== false)
    <div class="form-group  {{ $errors->has($name) ? 'has-error' : '' }}">
        {{ Form::label($label ? $label : $name, null, ['class' => 'control-label']) }}<span class="required_field"></span>
        {{ Form::password($name, array_merge(['class' => 'form-control'], $attributes?:[])) }}
        {!! $errors->first($label ? $label : $name, '<small class="help-block">:message</small>') !!}
    </div>
@else
    <div class="form-group  {{ $errors->has($name) ? 'has-error' : '' }}">
        {{ Form::label($label ? $label : $name, null, ['class' => 'control-label']) }}
        {{ Form::password($name, array_merge(['class' => 'form-control'], $attributes?:[])) }}
        {!! $errors->first($label ? $label : $name, '<small class="help-block">:message</small>') !!}
    </div>
@endif