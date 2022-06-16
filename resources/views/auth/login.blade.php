@extends('layout.auth')

{{-- Meta Tags --}}
@section('title', 'Login')

{{-- Content --}}
@section('content')
    <main>
        <div class="login">
            <div class="login__container">
                <img class="login__image u-margin-bottom-medium" src="{{ asset('images/isotipo_negro.png') }}" alt="Logo">

                <h3 class="heading-tertiary u-margin-bottom-medium">Iniciar sesión</h3>

                @if (session('status'))
                    <div>Se ha enviado un email a su correo electrónico.</div>
                @endif

                <form action="{{ route('login') }}" method="post" class="login__form form">
                    @csrf

                    @error('email')
                        <span class="text-red-500 w-96">Usuario o contraseña incorrecta.</span>
                    @enderror

                    <div class="form__control">
                        <input class="form__input" type="email" placeholder="Ingrese su email" name="email" required />
                    </div>

                    @error('password')
                        <span class="text-red-500 w-96">Contraseña inválida</span>
                    @enderror

                    <div class="form__control">
                        <input class="form__input" type="password" placeholder="Ingrese su contraseña" name="password"
                            required />
                    </div>

                    <div class="form__control form__show-password u-margin-bottom-small">
                        <input type="checkbox" id="show-password" onclick="showPassword()">
                        Mostrar Contraseña
                    </div>

                    <button class="button">
                        Acceder
                        <span class="move-left">&RightArrow;</span>
                    </button>
                </form>

                <form action="{{ route('password.request') }}">
                    @csrf

                    <button class="button button-small">Recuperar contraseña</button>
                </form>
            </div>
        </div>
    </main>

    {{-- TODO: Move this piece of code to its own file --}}
    <script>
        const passwordInput = document.querySelectorAll('input[type="password"]')

        const showPassword = () => {
            passwordInput.forEach(input => {
                if (input.type === 'password') {
                    input.type = 'text'
                } else {
                    input.type = 'password'
                }
            })
        }
    </script>
@endsection
