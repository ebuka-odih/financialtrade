@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <a style="margin: 0px" href="{{ route('homepage') }}"><img height="100" src="{{ asset('images/new-site/logo3.png') }}"/></a>
        @endcomponent
    @endslot

    {{-- Body --}}

## Hello Admin

## A withdraw request was made by {{ $name }}

## Withdrawal Request Details

Amount: ${{ $amount }} <br>
Address: {{ $btc_wallet }} <br>
Name: {{ $name }}

Visit your dashboard for more details
@slot('button')
    @component('mail::button', ['url' => ''])
    View Details
    @endcomponent
@endslot
<br>

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent

