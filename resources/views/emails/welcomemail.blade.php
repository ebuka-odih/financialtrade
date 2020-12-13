@component('mail::message')
# Dear {{ $name }}

## Welcome Aboard
Your account with Financial Trade Market has been approved


{{--@component('mail::button', ['url' => '', 'color' => 'success'])--}}
{{-- Goto--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
