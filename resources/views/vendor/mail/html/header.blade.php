<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
<a style="margin: 0px" href="{{ route('homepage') }}"><img height="100" src="{{ asset('images/new-site/logo3.png') }}"/></a>
@endif
</a>
</td>
</tr>
