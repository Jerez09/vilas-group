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

<div class="card @if ($orientation) card--inverted @endif u-margin-bottom-medium">
    @auth
        <div class="card__controllers">
            {{-- Edit product --}}
            <form action="{{ route($route . '.edit', ['locale' => $locale, 'id' => $product->id]) }}">
                <button class="card__controller">{{ __('Editar') }}</button>
            </form>

            <span class="card__divider">&nbsp;</span>

            {{-- Delete product --}}
            <form action="{{ route($route . '.destroy', ['locale' => $locale, 'id' => $product->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="card__controller">{{ __('Eliminar') }}</button>
            </form>
        </div>
    @endauth

    <div class="card__container">
        <div class="card__image">
            <span class="card__operation-image">
                @if ($product->operation == 1)
                    {{ __('Arriendo') }}
                @elseif($product->operation == 2)
                    {{ __('Venta') }}
                @elseif($product->operation == 3)
                    {{ __('Venta - Arriendo') }}
                @endif
            </span>

            <img src="{{ '/storage/app/public/' . $route . '/' . $product->slug . '/' . $product->thumbnail }}"
                alt="{{ $product->title }}" loading="lazy"/>

            <a
                href="{{ route($route . '.show', ['locale' => $locale, 'currency' => request()->currency, 'slug' => $product->slug]) }}">
                {{ __('Ver más') }}
            </a>
        </div>

        <div class="card__details">
            <div class="card__details--top">
                <div class="card__heading">
                    <h3 class="card__title heading-tertiary">
                        <a
                            href="{{ route($route . '.show', ['locale' => $locale, 'currency' => request()->currency, 'slug' => $product->slug]) }}">
                            {{ $product->title }}
                        </a>
                    </h3>
                    <span class="card__type">
                        @if (isPropertyRoute())
                            {{ $locale == 'es' ? $product->property_type->nombre : $product->property_type->name }}
                        @else
                            {{ $locale == 'es' ? $product->luxury_type->nombre : $product->luxury_type->name }}
                        @endif

                    </span>
                </div>

                <span class="card__operation-details">
                    @if ($product->operation == 1)
                        {{ __('Arriendo') }}
                    @elseif($product->operation == 2)
                        {{ __('Venta') }}
                    @elseif($product->operation == 3)
                        {{ __('Venta - Arriendo') }}
                    @endif
                </span>
            </div>

            <div class="card__details--middle">
                <span class="card__direction">{{ $product->location }}</span>
            </div>

            <div class="card__details--bottom">
                <span class="card__price">
                    @if (request()->currency)
                        {{ convertCurrency($product->currency, request()->currency, $product->price) }}

                    @else
                        {{ $product->currency }}
                        ${{ number_format($product->price) }}
                    @endif
                </span>
                <a class="button card__button"
                    href="{{ route($route . '.show', ['locale' => $locale, 'currency' => request()->currency, 'slug' => $product->slug]) }}">{{ __('Ver más') }}
                    &RightArrow;</a>
            </div>
        </div>

        @if (isPropertyRoute())
            <div class="card__features">
                @if ($product->area > 0)
                    <span class="card__feature">
                        <i class="fas fa-chart-area"></i>
                        {{ number_format($product->area) }}
                    </span>
                @endif

                @if ($product->bedrooms > 0)
                    <span class="card__feature">
                        <i class="fas fa-bed"></i>
                        {{ number_format($product->bedrooms) }}
                    </span>
                @endif

                @if ($product->bathrooms > 0)
                    <span class="card__feature">
                        <i class="fas fa-shower"></i>
                        {{ number_format($product->bathrooms) }}
                    </span>
                @endif

                @if ($product->parking_lots > 0)
                    <span class="card__feature">
                        <i class="fas fa-car"></i>
                        {{ number_format($product->parking_lots) }}
                    </span>
                @endif
            </div>
        @endif
    </div>
</div>
