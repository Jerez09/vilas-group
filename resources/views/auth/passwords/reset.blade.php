@extends('layout.auth')

{{-- Meta Tags --}}
@section('title', 'Reestablecer contraseña')

{{-- Content --}}
@section('content')
    <main>
        <div class="login">
            <div class="login__container">
                <img class="login__image u-margin-bottom-medium" src="{{ asset('images/isotipo_negro.png') }}" alt="Logo">

                <h3 class="heading-tertiary u-margin-bottom-medium">Reestablecer contraseña</h3>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}" class="login__form form">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="form__control">
                        <input class="form__input" type="email" name="email" placeholder="Ingrese su email"
                            value="{{ $email ?? old('email') }}" required autocomplete="email" />
                    </div>

                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="form__control">
                        <input class="form__input" type="password" placeholder="Ingrese su contraseña" name="password"
                            required autofocus />
                    </div>

                    @error('password_confirmation')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="form__control">
                        <input class="form__input" type="password" placeholder="Ingrese su contraseña"
                            name="password_confirmation" required />
                    </div>

                    <div class="form__control form__show-password u-margin-bottom-small">
                        <input type="checkbox" id="show-password" onclick="showPassword()">
                        Mostrar Contraseña
                    </div>

                    <button class="button">
                        Reestablecer
                        <span class="move-left">&RightArrow;</span>
                    </button>
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
