@component('mail::message')
Hola Sr(a) {{ $user->name }}; Su Usuario fue Registrado.

Estas son sus credenciales para acceder a {{ config('app.name') }}.

@component('mail::table')
| Username | Contraseña |
|:----------|:------------|
| {{ $user->email }} | {{ $password }} |
@endcomponent
	
@component('mail::button', ['url' => url('login')])
Ir al Login
@endcomponent

Gracias, Ing. Luis Rojas<br>
{{ config('app.name') }}
@endcomponent
