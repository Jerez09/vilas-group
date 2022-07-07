<form class="search-filter dropdown-form u-margin-bottom-big">
    <div class="search-filter__basic">
        <div class="dropdown-form__select-box">
            <div class="dropdown-form__container">
                <div class="dropdown-form__option">
                    <input type="radio" name="country" id="" class="dropdown-form__radio" disabled />
                    <label class="dropdown-form__label" for="">{{ __('País') }}</label>
                </div>

                {{-- Print countries options --}}
                @foreach ($countries as $country)
                    <div class="dropdown-form__option">
                        <input type="radio" name="country" id="{{ Str::slug($country->name) }}"
                            class="dropdown-form__radio" value="{{ $country->id }}" />
                        <label class="dropdown-form__label" for="{{ Str::slug($country->name) }}">
                            {{ App::currentLocale() == 'es' ? $country->nombre : $country->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="dropdown-form__selected dropdown-menu__selected-country">
                {{ __('País') }}
                <i class="fa fa-angle-down" aria-hidden="true"></i>
            </div>
        </div>

        @if (Str::contains(Request::url(), 'properties'))
            <div class="dropdown-form__select-box">
                <div class="dropdown-form__container">
                    <div class="dropdown-form__option">
                        <input type="radio" name="operation" id="" class="dropdown-form__radio" disabled />
                        <label class="dropdown-form__label" for="">{{ __('Operación') }}</label>
                    </div>

                    <div class="dropdown-form__option">
                        <input type="radio" name="operation" id="rental" class="dropdown-form__radio"
                            value="1" />
                        <label class="dropdown-form__label" for="rental">{{ __('Arriendo') }}</label>
                    </div>

                    <div class="dropdown-form__option">
                        <input type="radio" name="operation" id="sale" class="dropdown-form__radio"
                            value="2" />
                        <label class="dropdown-form__label" for="sale">{{ __('Venta') }}</label>
                    </div>


                    <div class="dropdown-form__option">
                        <input type="radio" name="operation" id="both" class="dropdown-form__radio"
                            value="3" />
                        <label class="dropdown-form__label" for="both">{{ __('Venta - Arriendo') }}</label>
                    </div>
                </div>

                <div class="dropdown-form__selected dropdown-menu__selected-operation">
                    {{ __('Operación') }} <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>
            </div>
        @endif

        <div class="dropdown-form__select-box">
            <div class="dropdown-form__container">
                <div class="dropdown-form__option">
                    <input type="radio" name="property_type" id="" class="dropdown-form__radio" disabled />
                    <label class="dropdown-form__label" for="">
                        {{ Str::contains(Request::url(), 'properties') ? __('Tipo de inmueble') : __('Tipo de lujo') }}
                    </label>
                </div>

                {{-- If the user is watching properties, print properties types in the filter,
                     else print luxuries types because the user is watchig luxuries --}}
                @php
                    if (Str::contains(Request::url(), 'properties')) {
                        $types = $property_types;
                    } else {
                        $types = $luxury_types;
                    }
                @endphp

                {{-- Print types options --}}
                @foreach ($types as $type)
                    <div class="dropdown-form__option">
                        <input type="radio" name="type" id="{{ Str::slug($type->name) }}"
                            class="dropdown-form__radio" value="{{ $type->id }}" />
                        <label class="dropdown-form__label" for="{{ Str::slug($type->name) }}">
                            {{ App::currentLocale() == 'es' ? $type->nombre : $type->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="dropdown-form__selected dropdown-menu__selected-type">
                {{ Str::contains(Request::url(), 'properties') ? __('Tipo de inmueble') : __('Tipo de lujo') }}
                <i class="fa fa-angle-down" aria-hidden="true"></i>
            </div>
        </div>

        <div class="dropdown-form__select-box">
            <div class="dropdown-form__container">
                <div class="dropdown-form__option">
                    <input type="radio" name="currency" id="" class="dropdown-form__radio" disabled />
                    <label class="dropdown-form__label" for="">{{ __('Moneda') }}</label>
                </div>

                <div class="dropdown-form__option">
                    <input type="radio" name="currency" id="USD" class="dropdown-form__radio" value="USD" />
                    <label class="dropdown-form__label" for="USD">{{ __('USD') }}</label>
                </div>

                <div class="dropdown-form__option">
                    <input type="radio" name="currency" id="EAU" class="dropdown-form__radio" value="EAU" />
                    <label class="dropdown-form__label" for="EAU">{{ __('EAU') }}</label>
                </div>

                <div class="dropdown-form__option">
                    <input type="radio" name="currency" id="MXN" class="dropdown-form__radio"
                        value="MXN" />
                    <label class="dropdown-form__label" for="MXN">{{ __('MXN') }}</label>
                </div>

                <div class="dropdown-form__option">
                    <input type="radio" name="currency" id="PAB" class="dropdown-form__radio"
                        value="PAB" />
                    <label class="dropdown-form__label" for="PAB">{{ __('PAB') }}</label>
                </div>

                <div class="dropdown-form__option">
                    <input type="radio" name="currency" id="CLP" class="dropdown-form__radio"
                        value="CLP" />
                    <label class="dropdown-form__label" for="CLP">{{ __('CLP') }}</label>
                </div>
            </div>

            <div class="dropdown-form__selected dropdown-menu__selected-currency">
                {{ __('Moneda') }} <i class="fa fa-angle-down" aria-hidden="true"></i>
            </div>
        </div>

        <button class="button search-filter__button" type="submit">{{ __('Buscar') }}</button>
    </div>

    <div class="search-filter__advanced">
        <div class="search-filter__form-control">
            <input class="search-filter__numeric-input" type="numeric" name="price_min"
                placeholder="{{ __('Precio mín') }}">
        </div>

        <div class="search-filter__form-control">
            <input class="search-filter__numeric-input" type="numeric" name="price_max"
                placeholder="{{ __('Precio max') }}">
        </div>

        @if (Str::contains(Request::url(), 'properties'))
            <div class="dropdown-form__select-box">
                <div class="dropdown-form__container">
                    <div class="dropdown-form__option">
                        <input type="radio" name="bedrooms" id="" class="dropdown-form__radio"
                            disabled />
                        <label class="dropdown-form__label" for="">{{ __('Recámaras') }}</label>
                    </div>

                    <div class="dropdown-form__option">
                        <input type="radio" name="bedrooms" id="one_bedrooms" class="dropdown-form__radio"
                            value="1" />
                        <label class="dropdown-form__label" for="one_bedrooms">{{ __('1 o más') }}</label>
                    </div>

                    <div class="dropdown-form__option">
                        <input type="radio" name="bedrooms" id="two_bedrooms" class="dropdown-form__radio"
                            value="2" />
                        <label class="dropdown-form__label" for="two_bedrooms">{{ __('2 o más') }}</label>
                    </div>

                    <div class="dropdown-form__option">
                        <input type="radio" name="bedrooms" id="four_bedrooms" class="dropdown-form__radio"
                            value="4" />
                        <label class="dropdown-form__label" for="four_bedrooms">{{ __('4 o más') }}</label>
                    </div>

                    <div class="dropdown-form__option">
                        <input type="radio" name="bedrooms" id="six_bedrooms" class="dropdown-form__radio"
                            value="6" />
                        <label class="dropdown-form__label" for="six_bedrooms">{{ __('6 o más') }}</label>
                    </div>

                    <div class="dropdown-form__option">
                        <input type="radio" name="bedrooms" id="eight_bedrooms" class="dropdown-form__radio"
                            value="8" />
                        <label class="dropdown-form__label" for="eight_bedrooms">{{ __('8 o más') }}</label>
                    </div>
                </div>

                <div class="dropdown-form__selected dropdown-menu__selected-bedrooms">
                    {{ __('Recámaras') }} <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>
            </div>

            <div class="dropdown-form__select-box">
                <div class="dropdown-form__container">
                    <div class="dropdown-form__option">
                        <input type="radio" name="bathrooms" id="" class="dropdown-form__radio"
                            disabled />
                        <label class="dropdown-form__label" for="">{{ __('Baños') }}</label>
                    </div>

                    <div class="dropdown-form__option">
                        <input type="radio" name="bathrooms" id="one_bathrooms" class="dropdown-form__radio"
                            value="1" />
                        <label class="dropdown-form__label" for="one_bathrooms">{{ __('1 o más') }}</label>
                    </div>

                    <div class="dropdown-form__option">
                        <input type="radio" name="bathrooms" id="two_bathrooms" class="dropdown-form__radio"
                            value="2" />
                        <label class="dropdown-form__label" for="two_bathrooms">{{ __('2 o más') }}</label>
                    </div>

                    <div class="dropdown-form__option">
                        <input type="radio" name="bathrooms" id="four_bathrooms" class="dropdown-form__radio"
                            value="4" />
                        <label class="dropdown-form__label" for="four_bathrooms">{{ __('4 o más') }}</label>
                    </div>

                    <div class="dropdown-form__option">
                        <input type="radio" name="bathrooms" id="six_bathrooms" class="dropdown-form__radio"
                            value="6" />
                        <label class="dropdown-form__label" for="six_bathrooms">{{ __('6 o más') }}</label>
                    </div>

                    <div class="dropdown-form__option">
                        <input type="radio" name="bathrooms" id="eight_bathrooms" class="dropdown-form__radio"
                            value="8" />
                        <label class="dropdown-form__label" for="eight_bathrooms">{{ __('8 o más') }}</label>
                    </div>
                </div>

                <div class="dropdown-form__selected dropdown-menu__selected-bathrooms">
                    {{ __('Baños') }} <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>
            </div>
        @endif
    </div>

    <button type="button" class="search-filter__advanced-search-button"><i class="fas fa-cog"></i>
        {{ __('Búsqueda avanzada') }}</button>
</form>
