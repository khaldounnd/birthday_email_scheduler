<?php

namespace App\Providers;

use Collective\Html\FormBuilder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);

        FormBuilder::component('textField', 'components.form.text_field', ['name', 'value', 'attributes', 'label']);
        FormBuilder::component('emailField', 'components.form.email_field', ['name', 'value', 'attributes', 'label']);
        FormBuilder::component('numberField', 'components.form.number_field', ['name', 'value', 'attributes', 'label']);
        FormBuilder::component('passwordField', 'components.form.password_field', ['name', 'attributes', 'label']);
        FormBuilder::component('selectField', 'components.form.select_field', ['name', 'value', 'selected', 'attributes', 'label']);
        FormBuilder::component('booleanField', 'components.form.boolean_field', ['name', 'value', 'checked', 'attributes', 'label']);
        FormBuilder::component('checkboxField', 'components.form.checkbox_field', ['name', 'value', 'checked', 'attributes', 'label']);
        FormBuilder::component('radioField', 'components.form.radio_field', ['name', 'value', 'checked', 'attributes', 'label']);
        FormBuilder::component('textareaField', 'components.form.textarea_field', ['name', 'value', 'attributes', 'label']);
        FormBuilder::component('submitField', 'components.form.submit_field', ['name', 'attributes']);
        FormBuilder::component('backField', 'components.form.back_field', ['name', 'value', 'attributes']);
    }
}
