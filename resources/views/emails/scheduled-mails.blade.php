@component('mail::message')
Hi {{ $to_name }}

{{ $message }}

Regards,
{{ $from_name }}
@endcomponent
