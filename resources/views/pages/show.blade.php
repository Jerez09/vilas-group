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
$slug = $product->slug;
@endphp

@extends('layout.index')

@section('title', 'Vilas Group | Luxury & Real Estate')

@section('description', $locale == 'en' ? $product->title : $product->title_translated)

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

    <main class="property">
        <header class="header header-show">
            <div class="header__container">
                <x-layout.navbar :slug=$slug />

                <div class="header__logo">
                    <img src="{{ asset('/images/logo.png') }}" alt="Logo - Vilas Group | Luxury & Real Estate"
                        loading="lazy">
                </div>

                <div class="">&nbsp;</div>
            </div>
        </header>

        <section class="carousel-section">
            <div class="carousel__heading">
                <h1 class="heading-secondary heading--gold">
                    {{ $product->title }}
                </h1>
                <div class="carousel__share-buttons">
                    <span>{{ __('Compartir') }}: </span>
                    @foreach ($social_share as $key => $value)
                        <a class="carousel__share-button" href="{{ $value }}" target="_blank"><i
                                class="fab fa-{{ $key }}"></i></i></a>
                    @endforeach
                </div>
            </div>
            <div class="carousel__container">
                <div class="carousel__images">
                    @foreach ($product->images as $image)
                        <img class="carousel__image"
                            src="{{ '/storage/app/public/' . $route . '/' . $product->slug . '/' . $image }}"
                            alt="{{ $product->title }}" width="1040px" loading="lazy">
                    @endforeach
                </div>
                @if (count($product->images) > 1)
                    <span class="carousel__left-button" onclick="sideSlide(-1)">
                        &leftarrow;
                    </span>
                    <span class="carousel__right-button" onclick="sideSlide(1)">
                        &rightarrow;
                    </span>
                @endif
            </div>
            <div class="carousel__options">
                <div class="carousel__options-container">
                    @foreach ($product->images as $image)
                        <img class="carousel__option {{ $loop->index == 0 ? 'active' : null }}"
                            src="{{ '/storage/' . $route . '/' . $product->slug . '/' . $image }}"
                            alt="image {{ $loop->index }}" {{ $loop->index == 0 ? 'active' : null }}
                            onclick="showImage({{ $loop->index }})">
                    @endforeach
                </div>
            </div>
        </section>

        <section class="details-section">
            <div class="details__heading u-margin-bottom-medium">
                <div class="details__title">
                    <h2 class="heading-secondary">{{ __('Detalles') }}</h2>

                    <span class="details__operation">
                        {{-- Display property opertaion depending on the integer --}}
                        @if ($product->operation == 1)
                            {{ __('Arriendo') }}
                        @elseif ($product->operation == 2)
                            {{ __('Venta') }}
                        @elseif ($product->operation == 3)
                            {{ __('Venta y arriendo') }}
                        @endif
                    </span>
                </div>

                <span class="details__price">
                    @if (request()->currency)
                        {{ convertCurrency($product->currency, request()->currency, $product->price) }}
                    @else
                        {{ $product->currency . ' $' . number_format($product->price) }}
                    @endif
                </span>
            </div>

            <div class="details__information">
                <div class="details__description">
                    {!! $locale == 'es' ? $product->description : $product->description_translated !!}
                </div>

                @if (isPropertyRoute())
                    <div class="details__features">
                        @if ($product->area > 0)
                            <div class="details__feature">
                                <i class="fas fa-chart-area"></i>
                                <div>
                                    <span>
                                        {{ number_format($product->area) }} m²
                                    </span>
                                </div>
                            </div>
                        @endif

                        @if ($product->bathrooms > 0)
                            <div class="details__feature">
                                <i class="fas fa-shower"></i>
                                <div>
                                    <span>{{ number_format($product->bathrooms) }}</span>
                                    <span>{{ __('baños') }}</span>
                                </div>
                            </div>
                        @endif

                        @if ($product->bedrooms > 0)
                            <div class="details__feature">
                                <i class="fas fa-bed"></i>
                                <div>
                                    <span>{{ number_format($product->bedrooms) }}</span>
                                    <span>{{ __('recámaras') }}</span>
                                </div>
                            </div>
                        @endif



                        @if ($product->parking_lots > 0)
                            <div class="details__feature">
                                <i class="fas fa-car"></i>
                                <div>
                                    <span>{{ number_format($product->parking_lots) }}</span>
                                    <span>{{ __('estacionamientos') }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </section>

        <section class="map-section">
            <h2 class="heading-secondary u-margin-bottom-medium">{{ __('Ubicación') }}</h2>

            <div class="map__iframe">
                {!! $product->map !!}
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script type="application/javascript">
        var indexValue = 0;

        const sideSlide = (index) => {
            showImage(indexValue += index)
        }

        const showImage = (index) => {
            const carousel = document.querySelector('.carousel__images');
            const optionContainer = document.querySelector('.carousel__options-container');
            const options = document.querySelectorAll('.carousel__option');

            options.forEach(option => {
                option.classList.remove('active');
            });

            if (index > options.length - 1) indexValue = 0
            else if (index < 0) indexValue = options.length - 1
            else indexValue = index

            options[indexValue].classList.add('active');

            carousel.style.transform = 'translateX(' + (indexValue * -100) + '%)';
            optionContainer.style.transform = 'translateX(' + (indexValue * -8.5) + 'rem)';
        }
    </script>
@endsection
