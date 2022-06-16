@extends('layout.auth')

{{-- Meta Tags --}}
@section('title', 'Recuperar contraseña')

{{-- Content --}}
@section('content')
    <main>
        <div class="login">
            <div class="login__container">
                <img class="login__image u-margin-bottom-medium" src="{{ asset('images/isotipo_negro.png') }}" alt="Logo">

                <h3 class="heading-tertiary u-margin-bottom-medium">Enviar correo de recuperación</h3>

                @if (session('status'))
                    <span class="text-green-500">{{ session('status') }}</span>
                @endif

                <form action="{{ route('password.email') }}" method="post" class="login__form form">
                    @csrf

                    @if (!session('status'))
                        <div class="form__control flex flex-col gap-2">
                            <input class="form__input" type="email" placeholder="Ingrese su email" name="email"
                                value="{{ old('email') }}" required />
                        </div>

                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <button class="button">
                            {{-- Enviar --}}
                            <span class="move-left">&RightArrow;</span>
                        </button>
                    @endif
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
