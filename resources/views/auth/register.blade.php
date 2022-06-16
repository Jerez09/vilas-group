@extends('layout.auth')

{{-- Meta Tags --}}
@section('title', 'Registrar')

{{-- Content --}}
@section('content')
    <main>
        <div class="login">
            <div class="login__container">
                <img class="login__image u-margin-bottom-medium" src="{{ asset('images/isotipo_negro.png') }}" alt="Logo">

                <h3 class="heading-tertiary u-margin-bottom-medium">Registrar</h3>

                <form action="{{ route('register', ['locale' => App::currentLocale()]) }}" method="post"
                    class="login__form form">
                    @csrf
                    <div class="form__control">
                        <input class="form__input" type="text" placeholder="Ingrese su nombre" name="name" required />
                    </div>

                    <div class="form__control">
                        <input class="form__input" type="email" placeholder="Ingrese su correo" name="email" required />
                    </div>

                    <div class="form__control">
                        <input class="form__input" type="password" placeholder="Ingrese su contraseña" name="password"
                            required />
                    </div>

                    <div class="form__control u-margin-bottom-small">
                        <input class="form__input" type="password" placeholder="Confirme su contraseña"
                            name="password_confirmation" required />
                    </div>

                    <div class="form__control form__show-password u-margin-bottom-small">
                        <input type="checkbox" id="show-password" onclick="showPassword()">
                        Mostrar Contraseña
                    </div>

                    <button class="button">
                        Registrar
                        <span class="move-left">&RightArrow;</span>
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
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
