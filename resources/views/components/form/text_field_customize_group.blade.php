<div class="row">
    <div class="col-md-4 col-3">
        {{ Form::label(Lang::get('message.'.$name), null, ['class' => 'control-label text-white']) }}
    </div>
    <div class="col-md-8 col-9">
        {{ Form::text($name, $value, array_merge(['class' => 'form-control margin-left-5'], $attributes?:[])) }}
        {!! $errors->first($name, '<small class="help-block error-message-color">:message</small>') !!}
    </div>
</div>