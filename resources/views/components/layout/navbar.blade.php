<nav class="navbar">
    <input class="navbar__checkbox" type="checkbox" id="nav-toggle">

    <label for="nav-toggle" class="navbar__button">
        <span class="navbar__icon">&nbsp;</span>
    </label>

    <div class="navbar__background">&nbsp;</div>

    <ul class="navbar__list">
        <li class="navbar__item" style="--order:1">
            <a href="{{ route('home', ['locale' => App::currentLocale()]) }}" class="navbar__link">
                {{ __('Inicio') }}
            </a>
        </li>

        <li class="navbar__item" style="--order:2">
            <a href="/#about" class="navbar__link">
                {{ __('Quiénes somos') }}
            </a>
        </li>

        <li class="navbar__item navbar__dropdown" style="--order:3">
            <span class="navbar__link">
                {{ __('Paises') }}
            </span>
            <ul class="dropdown-menu">
                <li class="dropdown-menu__item">
                    <a class="dropdown-menu__link"
                        href="/{{ App::currentLocale() }}/properties?country=1">{{ __('Estados Unidos') }}</a>
                </li>
                <li class="dropdown-menu__item">
                    <a class="dropdown-menu__link"
                        href="/{{ App::currentLocale() }}/properties?country=2">{{ __('México') }}</a>
                </li>
                <li class="dropdown-menu__item">
                    <a class="dropdown-menu__link"
                        href="/{{ App::currentLocale() }}/properties?country=3">{{ __('Panamá') }}</a>
                </li>
            </ul>
        </li>

        <li class="navbar__item" style="--order:4">
            <a href="/#contact" class="navbar__link">
                {{ __('Contáctanos') }}
            </a>
        </li>

        <li class="navbar__item navbar__dropdown" style="--order:5">
            <div class="navbar__link ">
                <span class="material-icons md-24">language</span>
                <span>{{ __('ES') }}</span>
            </div>
            <ul class="dropdown-menu">
                <li class="dropdown-menu__item">
                    <a class="dropdown-menu__link" href="{{ changeLocale('en') }}">{{ __('English') }}</a>
                </li>
                <li class="dropdown-menu__item">
                    <a class="dropdown-menu__link" href="{{ changeLocale('es') }}">{{ __('Español') }}</a>
                </li>
            </ul>
        </li>

        @auth
            {{-- Log out button --}}
            <li class="navbar__item" style="--order: 6;">
                <form action="{{ route('logout', ['locale' => App::currentLocale()]) }}" method="post">
                    @csrf

                    <button class="button button-gold" type="btn">Logout</button>
                </form>
            </li>
        @endauth
    </ul>
</nav>
