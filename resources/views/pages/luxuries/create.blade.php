<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>{{ __('Crear Luxury') }}</title>
</head>

<body>
    <main class="w-8/12 mx-auto py-10">
        <h1 class="text-3xl text-gray-600 uppercase font-bold mb-8">
            {{ $title }} Luxury
        </h1>
        <form class="w-full" method="post" action="{{ route('luxuries', ['locale' => App::currentLocale()]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="flex flex-wrap -mx-3 mb-9">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label
                        class="
                                block
                                uppercase
                                tracking-wide
                                text-gray-700 text-xs
                                font-bold
                                mb-2
                            "
                        for="title">
                        {{ __('Titulo') }}
                    </label>
                    <input
                        class="
                                appearance-none
                                block
                                w-full
                                bg-gray-200
                                text-gray-700
                                border border-gray-200
                                rounded
                                py-3
                                px-4
                                mb-3
                                leading-tight
                                focus:outline-none focus:bg-white
                                @error('title') border-red-500 @enderror
                            "
                        value="{{ old('title') }}" id="title" type="text" name="title" required />
                    @error('title')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-9">
                <div class="flex flex-wrap justify-between w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <div class="w-7/12">
                        <label
                            class="
                                block
                                uppercase
                                tracking-wide
                                text-gray-700 text-xs
                                font-bold
                                mb-2
                            "
                            for="price">
                            {{ __('Precio') }}
                        </label>
                        <input
                            class="
                                appearance-none
                                block
                                w-full
                                bg-gray-200
                                text-gray-700
                                border border-gray-200
                                rounded
                                py-3
                                px-4
                                mb-3
                                leading-tight
                                focus:outline-none focus:bg-white
                                @error('price') border-red-500 @enderror
                            "
                            value="{{ old('price') }}" id="price" type="number" name="price" min="0" step="1"
                            required />
                        @error('price')
                            <div class=" text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="w-4/12 self-end">
                        <div class="relative">
                            <select
                                class="
                                    block
                                    appearance-none
                                    w-full
                                    bg-gray-200
                                    border border-gray-200
                                    text-gray-700
                                    py-3
                                    px-4
                                    pr-8
                                    rounded
                                    mb-3
                                    leading-tight
                                    focus:outline-none
                                    focus:bg-white
                                    focus:border-gray-500
                                    @error('currency') border-red-500 @enderror
                                "
                                value="{{ old('currency') }}" id="grid-state" name="currency" required>
                                <option value="USD" default selected>USD</option>
                                <option value="EAU">EAU</option>
                                <option value="MXN">MXN</option>
                                <option value="CLP">CLP</option>
                                <option value="PAB">PAB</option>
                            </select>
                            <div
                                class="
                                    pointer-events-none
                                    absolute
                                    inset-y-0
                                    right-0
                                    flex
                                    items-center
                                    px-2
                                    text-gray-700
                                ">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                            @error('currency')
                                <div class=" text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label
                        class="
                                block
                                uppercase
                                tracking-wide
                                text-gray-700 text-xs
                                font-bold
                                mb-2
                            "
                        for="location">
                        {{ __('Ubicación') }}
                    </label>
                    <input
                        class="
                                appearance-none
                                block
                                w-full
                                bg-gray-200
                                text-gray-700
                                border border-gray-200
                                rounded
                                py-3
                                px-4
                                leading-tight
                                focus:outline-none
                                focus:bg-white
                                focus:border-gray-500
                                @error('location') border-red-500 @enderror
                            "
                        value="{{ old('location') }}" id="location" type="text" name="location" required />
                    @error('location')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-9">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label
                        class="
                                block
                                uppercase
                                tracking-wide
                                text-gray-700 text-xs
                                font-bold
                                mb-2
                            "
                        for="grid-state">
                        {{ __('Operación') }}
                    </label>
                    <div class="relative">
                        <select
                            class="
                                    block
                                    appearance-none
                                    w-full
                                    bg-gray-200
                                    border border-gray-200
                                    text-gray-700
                                    py-3
                                    px-4
                                    pr-8
                                    rounded
                                    leading-tight
                                    focus:outline-none
                                    focus:bg-white
                                    focus:border-gray-500
                                    @error('operation') border-red-500 @enderror
                                "
                            value="{{ old('operation') }}" id="grid-state" name="operation" required>
                            <option selected disabled hidden></option>
                            <option value="1">{{ __('Arriendo') }}</option>
                            <option value="2">{{ __('Venta') }}</option>
                            <option value="3">{{ __('Venta y arriendo') }}</option>
                        </select>
                        <div
                            class="
                                    pointer-events-none
                                    absolute
                                    inset-y-0
                                    right-0
                                    flex
                                    items-center
                                    px-2
                                    text-gray-700
                                ">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                    @error('operation')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label
                        class="
                                block
                                uppercase
                                tracking-wide
                                text-gray-700 text-xs
                                font-bold
                                mb-2
                            "
                        for="luxury_type_id">
                        {{ __('Tipo de propiedad') }}
                    </label>
                    <div class="relative">
                        <select
                            class="
                                    block
                                    appearance-none
                                    w-full
                                    bg-gray-200
                                    border border-gray-200
                                    text-gray-700
                                    py-3
                                    px-4
                                    pr-8
                                    rounded
                                    leading-tight
                                    focus:outline-none
                                    focus:bg-white
                                    focus:border-gray-500
                                    @error('luxury_type_id') border-red-500 @enderror
                                "
                            value="{{ old('luxury_type_id') }}" id="luxury_type_id" name="luxury_type_id" required>
                            <option selected disabled hidden></option>

                            {{-- Print options for each property type --}}
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">
                                    {{ $type->nombre }}
                                </option>
                            @endforeach

                        </select>
                        <div
                            class="
                                    pointer-events-none
                                    absolute
                                    inset-y-0
                                    right-0
                                    flex
                                    items-center
                                    px-2
                                    text-gray-700
                                ">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                        @error('luxury_type_id')
                            <div class=" text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label
                        class="
                                block
                                uppercase
                                tracking-wide
                                text-gray-700 text-xs
                                font-bold
                                mb-2
                            "
                        for="country_id">
                        Pais
                    </label>
                    <div class="relative">
                        <select
                            class="
                                    block
                                    appearance-none
                                    w-full
                                    bg-gray-200
                                    border border-gray-200
                                    text-gray-700
                                    py-3
                                    px-4
                                    pr-8
                                    rounded
                                    leading-tight
                                    focus:outline-none
                                    focus:bg-white
                                    focus:border-gray-500
                                    @error('country_id') border-red-500 @enderror
                                "
                            value="{{ old('country_id') }}" id="country_id" name="country_id" required>
                            <option selected disabled hidden></option>

                            {{-- Print options for each country --}}
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->nombre }}</option>
                            @endforeach

                        </select>
                        <div
                            class="
                                    pointer-events-none
                                    absolute
                                    inset-y-0
                                    right-0
                                    flex
                                    items-center
                                    px-2
                                    text-gray-700
                                ">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                    @error('country_id')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-9">
                <div class="w-full px-3">
                    <label
                        class="
                                block
                                uppercase
                                tracking-wide
                                text-gray-700 text-xs
                                font-bold
                                mb-2
                            "
                        for="description">
                        {{ __('Descripción') }}
                    </label>
                    <textarea id="editor" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-9">
                <div class="w-full px-3">
                    <label
                        class="
                                block
                                uppercase
                                tracking-wide
                                text-gray-700 text-xs
                                font-bold
                                mb-2
                            "
                        for="description_translated">
                        {{ __('Descripción - Inglés') }}
                    </label>
                    <textarea id="editor2" name="description_translated">{{ old('description_translated') }}</textarea>
                    @error('description_translated')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-9">
                <div class="w-full px-3">
                    <label
                        class="
                                block
                                uppercase
                                tracking-wide
                                text-gray-700 text-xs
                                font-bold
                                mb-2
                            "
                        for="map">
                        {{ __('Mapa') }}
                    </label>
                    <textarea
                        class="
                                appearance-none
                                block
                                w-full
                                bg-gray-200
                                text-gray-700
                                border border-gray-200
                                rounded
                                py-3
                                px-4
                                mb-3
                                leading-tight
                                focus:outline-none
                                focus:bg-white
                                focus:border-gray-500
                                @error('map') border-red-500 @enderror
                            "
                            id="map" name="map" required>{{ old('map') }}</textarea>
                    @error('map')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-9">
                <div class="w-full md:w-1/2 px-3">
                    <label
                        class="
                                block
                                uppercase
                                tracking-wide
                                text-gray-700 text-xs
                                font-bold
                                mb-2
                            "
                        for="thumbnail">
                        {{ __('Miniatura') }}
                    </label>
                    <input
                        class="
                                appearance-none
                                block
                                w-full
                                bg-gray-200
                                text-gray-700
                                border border-gray-200
                                rounded
                                py-3
                                px-4
                                mb-3
                                leading-tight
                                focus:outline-none
                                focus:bg-white
                                focus:border-gray-500
                                @error('thumbnail') border-red-500 @enderror
                            "
                        value="{{ old('thumbnail') }}" aria-describedby="thumbnail" id="thumbnail" type="file"
                        name="thumbnail" required />
                    @error('thumbnail')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label
                        class="
                                block
                                uppercase
                                tracking-wide
                                text-gray-700 text-xs
                                font-bold
                                mb-2
                            "
                        for="images">
                        {{ __('Imágenes') }}
                    </label>
                    <input
                        class="
                                appearance-none
                                block
                                w-full
                                bg-gray-200
                                text-gray-700
                                border border-gray-200
                                rounded
                                py-3
                                px-4
                                mb-3
                                leading-tight
                                focus:outline-none
                                focus:bg-white
                                focus:border-gray-500
                                @error('images') border-red-500 @enderror
                            "
                        value="{{ old('images') }}" aria-describedby="images" id="images" type="file" name="images[]"
                        multiple="true" required />
                    @error('images')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap justify-end -mx-3 mb-9">
                <button type="submit"
                    class="
                            text-white
                            bg-blue-700
                            hover:bg-blue-800
                            focus:ring-4 focus:ring-blue-300
                            font-medium
                            rounded-lg
                            text-sm
                            px-5
                            py-2.5
                            text-center
                            inline-flex
                            items-center
                            dark:bg-blue-600
                            dark:hover:bg-blue-700
                            dark:focus:ring-blue-800
                        ">
                    {{ __('Enviar') }}
                    <svg class="-mr-1 ml-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </form>
    </main>
    <script>
        CKEDITOR.replace("editor");
        CKEDITOR.replace("editor2");
    </script>
    <script src="{{ asset('js/FileInput.js') }}"></script>
</body>

</html>
