@extends('layout.index')

@push('metatags')
    <meta rel="canonical" href="vilas-group.com">
    <meta name="keywords" content="lujos, luxuries, propiedades, properties, house, casa, departamento, deparment" />
@endpush

@section('title', 'Vilas Group | Luxury & Real Estate')

@section('description', 'Vilas Group Luxury & Real Estate es un proyecto que inció en el 2021 con la finalidad de crear un equipo de líderes dentro del mundo de los bienes raíces, utilizando la tecnología y herramientas del mundo actual como canales de venta.')

@section('content')
    {{-- Displays message when creating or updating property --}}
    @if (session('message') && session('status'))
        @php
            $message = session('message');
            $status = session('status');
        @endphp

        <x-layout.dialog-message :message=$message :status=$status />
    @endif

    <x-layout.chat />

    <main class="body">
        <header class="header header-home" id="home">
            <div class="header__container">
                <x-layout.navbar />

                <div class="header__logo fadeIn">
                    <img src="{{ asset('/images/logo.png') }}" alt="Logo - Vilas Group | Luxury & Real Estate"
                        loading="lazy">
                </div>

                <div class="header__links">
                    <a style="--order: 7" href="{{ route('luxuries', ['locale' => App::currentLocale()]) }}"
                        class="header__link fadeIn">
                        <span class="header__link-arrow">
                            &leftarrow;
                        </span>
                        Luxury
                    </a>
                    <a style="--order: 8" href="{{ route('properties', ['locale' => App::currentLocale()]) }}"
                        class="header__link fadeIn">
                        Real Estate
                        <span class="header__link-arrow">
                            &rightarrow;
                        </span>
                    </a>
                </div>
            </div>
        </header>

        <section class="section-about" id="about">
            <div class="about">
                <div class="about__text">
                    <h2 class="heading-secondary">{{ __('Quiénes somos') }}</h2>
                    <p class="about__description">
                        {{ __('Vilas Group Luxury & Real Estate es un proyecto que inció en el 2021 con la finalidad de crear un equipo de líderes dentro del mundo de los bienes raíces, utilizando la tecnología y herramientas del mundo actual como canales de venta.') }}
                    </p>
                    <strong class="about__phrase">
                        {{ __('Nos caracteriza el liderazgo, la pasión y el éxito.') }}
                    </strong>
                </div>
                <video class="about__video" src="{{ asset('videos/about_video.mp4') }}" loading="lazy" muted autoplay
                    loop></video>
            </div>
        </section>

        <section class="section-team">
            <div class="team">
                <h2 class="heading-secondary u-margin-bottom-big">{{ __('Nuestro equipo') }}</h2>
                <div class="team__members">
                    <div class="team__member team__member-associated">
                        <img class="team__member-image" src="{{ asset('images/members/member_2.jpg') }}" loading="lazy"
                            alt="Socio 1" />
                        <h3 class="team__member-name heading-tertiary">Inna Moll</h3>
                        <span class="team__member-ocupation">{{ __('asociada') }}</span>
                    </div>

                    <div class="team__member team__member-founder">
                        <img class="team__member-image" src="{{ asset('images/members/member_4.jpg') }}" loading="lazy"
                            alt="Socio 1" />
                        <h3 class="team__member-name heading-tertiary">José Carlos Vilas</h3>
                        <span class="team__member-ocupation">{{ __('fundador') }}</span>
                    </div>

                    <div class="team__member team__member-associated">
                        <img class="team__member-image" src="{{ asset('images/members/member_1.jpg') }}" loading="lazy"
                            alt="Socio 1" />
                        <h3 class="team__member-name heading-tertiary">Juan Matamala</h3>
                        <span class="team__member-ocupation">{{ __('asociado') }}</span>
                    </div>

                    <div class="team__member team__member-director">
                        <img class="team__member-image" src="{{ asset('images/members/member_3.jpg') }}" loading="lazy"
                            alt="Socio 1" />
                        <h3 class="team__member-name heading-tertiary">Daniella Belmont</h3>
                        <span class="team__member-ocupation">{{ __('directora de planificación estratégica') }}</span>
                    </div>
                </div>
        </section>

        <section class="section-contact" id="contact">
            <div class="contact">
                <form class="contact__form" method="POST"
                    action="{{ route('contact', ['locale' => App::currentLocale()]) }}">
                    @csrf

                    <h2 class="heading-secondary u-margin-bottom-medium">{{ __('Contáctanos') }}</h2>

                    <div class="contact__form-group">
                        <label class="contact__form-label" for="name">{{ __('Nombre') }}</label>
                        <input class="contact__form-input" id="name" name="name" type="text"
                            placeholder="{{ __('Ingrese su nombre...') }}" value="{{ old('name') }}" required>
                        @error('name')
                            <div class=" text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="contact__form-group">
                        <label class="contact__form-label" for="email">{{ __('Email') }}</label>
                        <input class="contact__form-input" id="email" name="email" type="text"
                            placeholder="{{ __('Ingrese su email...') }}" value="{{ old('email') }}" required>
                        @error('email')
                            <div class=" text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="contact__form-group">
                        <label class="contact__form-label" for="message">{{ __('Mensaje') }}</label>
                        <textarea class="contact__form-textarea" id="message" name="message" cols="40" rows="6" required>{{ old('text') }}</textarea>
                        @error('message')
                            <div class=" text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="contact_form-group">
                        {!! NoCaptcha::renderJs(App::currentLocale(), false, 'recaptchaCallback') !!}
                        {!! NoCaptcha::display() !!}
                        @error('g-recaptcha-response')
                            <div class=" text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="contact__form-button button">{{ __('Enviar') }} &rightarrow;</button>
                </form>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        const navItems = document.querySelectorAll('.navbar__item');

        navItems.forEach(item => {
            item.classList.add('dropIn');
        });
    </script>
@endsection
