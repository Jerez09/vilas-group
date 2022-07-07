<footer class="footer">
    <div class="footer__background">&nbsp;</div>
    <div class="footer__container">
        <div class="footer__logo">
            <img src="{{ asset('/images/logo.png') }}" alt="Logo">
        </div>

        <div>
            <h3 class="heading-tertiary heading-tertiary--gold heading-tertiary--center u-margin-bottom-medium">
                {{ __('Enlaces') }}</h3>
            <div class="footer__links">
                <a href="{{ route('home', App::currentLocale()) }}" class="footer__link">{{ __('Inicio') }}</a>
                <a href="" class="footer__link">{{ __('Quiénes somos') }}</a>
                <a href="" class="footer__link">{{ __('Contáctanos') }}</a>
                <a href="/properties" class="footer__link">{{ __('Propiedades') }}</a>
                <a href="/policy" class="footer__link">{{ __('Política de privacidad') }}</a>
            </div>
        </div>

        <div>
            <h3 class="heading-tertiary heading-tertiary--gold heading-tertiary--center u-margin-bottom-medium">
                {{ __('Redes Sociales') }}
            </h3>
            <div class="footer__socials">
                <a href="https://www.instagram.com/vilasgroup_luxury/" target="_blank" class="footer__link">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="footer__link">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="" class="footer__link">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>

    <small class="footer__copyright">&copy; Vilas Group 2022 | Made by <a href="https://www.linkedin.com/in/jerezjustin/">Justin Jerez</a></small>
</footer>
