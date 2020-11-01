@component('mail::message')
# Dear {{ $name }}

## The sum of ${{ $amount }} has been successfully sent to your Bitcoin wallet from Coinminer

<br>
Wallet: {{ $walletid }} <br>
Transaction Hash: {{ $trans_hash }}


<br><br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
