@extends('layout.index')

@section('title', 'Vilas Group | Luxury & Real Estate')

@section('description', 'No lo sueñes, vívelo')

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
        <header class="header header-policy">
            <div class="header__container">
                <x-layout.navbar />

                <div class="header__logo">
                    <img src="{{ asset('/images/logo.png') }}" alt="Logo - Vilas Group | Luxury & Real Estate">
                </div>
            </div>
        </header>

        <section class="policy">
            <div class="policy__heading u-margin-bottom-big">
                <h1 class="policy__title heading-primary--black">{{ __('Política de privacidad') }}</h1>
                <span class="policy__description">
                    {{ __('Esta política de privacidad explica cómo recopilamos información de usted y para qué se utiliza.') }}
                </span>
            </div>
            <div class="policy__terms">
                <div class="term">
                    <h2 class="term__title heading-tertiary">{{ __('Información que proporciona') }}</h2>
                    <p>
                        {{ __('Puede proporcionarnos información de contacto personal de varias maneras, incluido el envío de una consulta de propiedad, comunicarse con nosotros por correo electrónico, completar una encuesta, participar en una competencia, completar una revisión, proporcionar comentarios o informar un problema. Solo almacenamos sus datos personales después de que haya dado su consentimiento al aceptar nuestros términos y condiciones en el formulario.') }}
                    </p>
                </div>

                <div class="term">
                    <h2 class="term__title heading-tertiary">{{ __('Información que recopilamos') }}</h2>
                    <p>
                        {{ __('Recopilamos automáticamente metadatos de su navegador web limitados al tipo y la versión, la marca y el modelo del dispositivo, su dirección IP, el dominio de referencia y la configuración de idioma del navegador.') }}
                    </p>
                </div>

                <div class="term">
                    <h2 class="term__title heading-tertiary">
                        {{ __('Formas en que podríamos compartir su información personal') }}</h2>
                    <p>
                        {{ __('Proporcionamos su nombre, correo electrónico y número de teléfono a los agentes cada vez que envía una consulta de propiedad en Vilas Group Luxury & Real Estate. Una vez que hayamos enviado estos datos, la propia política de privacidad de los agentes se aplicará a cómo los usan. Enviamos información sobre su visita a proveedores de motores de búsqueda y análisis con el fin de mejorar nuestros servicios. Estos datos incluyen IP, la dirección, las páginas visitadas y el tipo de navegador, pero no contienen ningún identificador personal directo, como el nombre o la dirección de correo electrónico. Podemos enviar sus metadatos a redes publicitarias con el fin de mostrarle anuncios relevantes. Si se adquiere Vilas Group Luxury & Real Estate o sus activos, los datos de usuario que tenemos serán parte de la transferencia. Si obtenemos asesoramiento profesional (por ejemplo, de abogados o asesores financieros), podemos divulgar su información personal. Podemos divulgar su información personal si así lo exige un gobierno o una autoridad reguladora.') }}
                    </p>
                </div>

                <div class="term">
                    <h2 class="term__title heading-tertiary">{{ __('Formas en que utilizamos su información personal') }}
                    </h2>
                    <p>
                        {{ __('Satisfacer sus solicitudes, como reenviar consultas sobre propiedades a agentes o desarrolladores. Proporcionarle información sobre los servicios de Vilas Group Luxury & Real Estate que puedan interesarle. Cualquier correo electrónico de marketing que le enviemos tendrá la opción de darse de baja. Mejorar su experiencia de nuestros servicios, p. asegurando que el contenido se presente de la manera más efectiva para su dispositivo. Entregarle publicidad relevante en nuestro sitio u otros sitios operados por Vilas Group Luxury & Real Estate. Administración empresarial interna, análisis de datos, solución de problemas, pruebas e investigación.') }}
                    </p>
                </div>

                <div class="term">
                    <h2 class="term__title heading-tertiary">{{ __('Almacenamiento de su información personal') }}</h2>
                    <p>
                        {{ __('Podemos almacenar su información en servidores seguros en cualquier parte del mundo. Al enviar su información personal, acepta esta transferencia, almacenamiento o procesamiento. Dondequiera que estén nuestros servidores, confiamos en mecanismos de transferencia de datos aprobados para garantizar que su información personal esté debidamente protegida. Una vez que nos ha enviado sus datos, utilizamos procedimientos estrictos para garantizar que sus datos estén seguros; sin embargo, no podemos garantizar su seguridad. Cualquier dato que nos envíe se envía bajo su propio riesgo. Cuando tenga una contraseña que le permita acceder a algunas partes de nuestros sitios web, usted es responsable de mantener la confidencialidad de esa contraseña. No debe compartir su contraseña con nadie.') }}
                    </p>
                </div>

                <div class="term">
                    <h2 class="term__title heading-tertiary">{{ __('Solicitar la eliminación de datos') }}</h2>
                    <p>
                        {{ __('Conservamos su información personal durante el tiempo que sea necesario para los fines para los que fue solicitada. Si desea eliminar su información de nuestros servidores, puede solicitarnos que lo hagamos poniéndose en contacto con nosotros.') }}
                    </p>
                </div>

                <div class="term">
                    <h2 class="term__title heading-tertiary">{{ __('Cookies') }}</h2>
                    <p>
                        {{ __('Usamos cookies para distinguirlo de otros usuarios de Vilas Group Luxury & Real Estate. Esto nos permite personalizar su experiencia cuando utiliza nuestro sitio web, p. recordando su moneda elegida o sus propiedades favoritas. La red publicitaria de Google utiliza una cookie para registrar su actividad (incluidas las páginas visitadas) y estimar qué información le interesa más. Utilizan esta información de acuerdo con sus propias políticas de privacidad.') }}
                    </p>
                </div>

                <div class="term">
                    <h2 class="term__title heading-tertiary">{{ __('Enlaces a sitios web de terceros') }}</h2>
                    <p>
                        {{ __('Siempre que nuestro sitio web contenga enlaces a otros sitios web, esta política de privacidad no se aplica a esos otros sitios web y no aceptamos responsabilidad por el contenido de ningún otro sitio web. Consulte la política de privacidad de cualquier otro sitio web antes de enviarle información personal.') }}
                    </p>
                </div>

                <div class="term">
                    <h2 class="term__title heading-tertiary">{{ __('Contáctanos') }}</h2>
                    <p>
                        {{ __('Cualquier cambio que podamos hacer a esta Política en el futuro se publicará en esta página. Si tiene alguna pregunta con respecto a esta política de privacidad, puede comunicarse con nosotros.') }}
                    </p>
                </div>
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
