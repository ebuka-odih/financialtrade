@component('mail::message')
# Dear {{ $name }}

## The sum of ${{ $amount }} has been successfully sent to your Bitcoin wallet from Financial Trade Market

<br>
Wallet: {{ $btc_wallet }} <br>
Transaction Hash: {{ $trans_hash }} <br>
Payment Method: {{ $payment_method }}


<br><br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
