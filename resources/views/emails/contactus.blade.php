@component('mail::message')
# A message to Coinminer Support

<br>
## Details:
<strong>Name</strong> {{ $data['name'] }} <br>
<strong>Email</strong> {{ $data['email'] }}

<strong>Message</strong>
<p>{{ $data['message'] }}</p>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
