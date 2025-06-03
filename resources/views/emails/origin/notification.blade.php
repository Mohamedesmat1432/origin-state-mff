@component('mail::message')
<div dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" class="rtl:text-right ltr:text-left">
    # {{ $action }}

    {{ __('site.hello') }} {{ $recipient->name }},

    {{__('site.origin_id')}} **{{ $origin->id }}**,

    {{ __('site.origin_has_been') }} {{ $action_by }} **{{ $sender->name }}**.
</div>

@component('mail::button', ['url' => url('/origins')])
{{__('site.show')}} {{__('site.origins')}}
@endcomponent

{{ __('site.thank') }},<br>
{{ __('site.assets_managment_system') }}
@endcomponent