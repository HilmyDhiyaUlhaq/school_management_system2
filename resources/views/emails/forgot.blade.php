@component('mail::message')
Hello {{$user->name}},

<p>Kami Paham Itu Terjadi. </p>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
Reset Password Anda
@endcomponent

<p>Apabila Anda mamiliki masalah dalam mengembalikan password Anda, harap hubungi kami. </p>

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
