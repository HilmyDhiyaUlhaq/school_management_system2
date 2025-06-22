@component('mail::message')
Halo {{$user->name}},

{!! $user->send_message !!}

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
