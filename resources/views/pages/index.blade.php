{{-- Avoiding repetition by adding some variables and conditions at first --}}
@php
if (!function_exists('isPropertyRoute')) {
    function isPropertyRoute()
    {
        if (Str::contains(Request::url(), 'properties')) {
            return true;
        }

        return false;
    }
}

$locale = App::currentLocale();
$route = isPropertyRoute() ? 'properties' : 'luxuries';
@endphp

@extends('layout.index')

@section('title', isPropertyRoute() ? __('Real Estate') : __('Luxury'))

@section('description', __('Resultados de la búsqueda'))

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
@endsection

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

    {{-- Print warning --}}
    @if (request()->currency)
        @php
            $message = __('Las conversiones de moneda son aproximadas.');
            $status = 'info';

        @endphp

        <x-layout.dialog-message :message=$mes    sage :status=$status />
    @endif

    <main>
        <header class="header header-index">
            <div class="header__container">
                <x-layout.navbar />

                <div class="header__title">
                    <h1 class="heading-primary">{{ isPropertyRoute() ? __('Real Estate') : __('Luxury') }}</h1>
                    <p>{{ __('No lo sueñes, vívelo') }}</p>
                </div>

                <x-layout.filter />
            </div>
        </header>

        <section class="index">
            {{-- Why invest in the country --}}
            @if (request()->country && isPropertyRoute())
                @php
                    $contents = whyInvest(request()->country);
                @endphp

                <x-layout.invest :contents=$contents />
            @endif

            <div class="index__heading">
                <div>
                    <h2 class="heading-secondary u-margin-bottom-small">{{ __('Resultados de la búsqueda') }}</h2>

                    <div class="index__results u-margin-bottom-big">
                        {{-- Returns the number of properties found --}}
                        <span class="index__quantity">
                            {{ $products->count() }}
                            @if (isPropertyRoute())
                                {{ $products->count() == 1 ? __('propiedad') : __('propiedades') }}
                            @else
                                {{ $products->count() == 1 ? __('producto') : __('productos') }}
                            @endif
                        </span>
                    </div>
                </div>

                @auth
                    <a class="index__create" href="/{{ $locale }}/{{ $route }}/create">
                        <i class="fas fa-plus"></i>
                        {{ isPropertyRoute() ? __('Añadir Propiedad') : __('Agregar lujo') }}
                    </a>
                @endauth
            </div>

            <div class="index__container">
                {{-- Making sure there are properties to index --}}
                @if ($products->count() > 0)
                    @foreach ($products as $product)
                        {{-- If the property has an odd index it will be displayed inverted --}}
                        @if ($loop->iteration % 2 != 0)
                            <x-card :orientation=false :product=$product />
                        @else
                            <x-card :orientation=true :product=$product />
                        @endif
                    @endforeach
                @else
                    <div class="index__not-found">
                        <img src="{{ asset('/images/isotipo_negro.png') }}" alt="Logo">
                        {{ __('No hay resultados para mostrar') }}
                    </div>
                @endif
            </div>
            <div class="index__pagination">
                {{ $products->links() }}
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    {{-- TODO: Move this piece of code to its own file --}}
    <script>
        const containers = document.querySelectorAll('.dropdown-form__container');
        const targets = document.querySelectorAll('.dropdown-form__selected');

        const indexDropdownMenu = (selected) => {
            containers.forEach(container => {
                if (container === selected) {
                    container.classList.toggle('active')
                    container.nextElementSibling.innerHTML = container.nextElementSibling.innerHTML.replace(
                        'down', 'up')

                    if (!container.classList.contains('active')) {
                        container.nextElementSibling.innerHTML = container.nextElementSibling.innerHTML.replace(
                            'up', 'down')
                    }
                } else {
                    container.classList.remove('active')
                    container.nextElementSibling.innerHTML = container.nextElementSibling.innerHTML.replace(
                        'up', 'down')
                }
            })
        }

        // indexs the order by dropdown menu by clicking it
        document.addEventListener('click', (evt) => {
            const target = evt.target

            if (!target.classList.contains('dropdown-form__selected')) {
                indexDropdownMenu(target);
            }
        })

        //
        document.querySelectorAll('.dropdown-form__selected').forEach(target => {
            target.addEventListener('click', () => {
                container = target.previousElementSibling
                indexDropdownMenu(container)
            })
        })

        /* Changes the text to the selected option content */
        document.querySelectorAll('.dropdown-form__label').forEach(option => {
            option.addEventListener('click', (evt) => {
                const input = document.querySelector(`#${option.htmlFor}`);
                const target = document.querySelector(`.dropdown-menu__selected-${input.name}`);

                target.innerHTML = option.innerHTML + `<i class="fa fa-angle-down" aria-hidden="true"></i>`
            })
        })

        // index advanced search
        document.querySelector('.search-filter__advanced-search-button')
            .addEventListener('click', () => {
                const advancedForm = document.querySelector('.search-filter__advanced')
                advancedForm.classList.toggle('active')
            })
    </script>
@endsection
