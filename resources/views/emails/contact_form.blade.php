@component('mail::message')
    # Formulario de contacto

    Nombre:
    {{ $name }}

    Email:
    {{ $email }}

    Mensaje:
    {{ $message }}

    # {{ config('app.name') }}
@endcomponent
