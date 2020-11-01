@component('mail::message')
# Hello {{ $name }}

You've requested to withdraw ${{ $amount }} <br>
Wallet Address: {{ $btc_wallet }} <br>
Payment Method: {{ $payment_method }}

<p>Before going further with the withdrawal, <strong>please check carefully the target address.</strong>
    <br>Be aware that if you confirm an incorrect address, we won't be able to assist you to recover your assets</p>

@component('mail::button',  ['url' => route('user.withdrawal_history'), 'color' => 'success'])
View Transaction
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
