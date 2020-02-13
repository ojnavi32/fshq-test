@component('mail::message')

New Company created email

Company Name: {{ $company->name }}
<br>
Email: {{ $company->email }}
<br>
Website: {{ $company->website }}

@endcomponent
