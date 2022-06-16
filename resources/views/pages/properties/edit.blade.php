<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>Editar Propiedad</title>
</head>

<body>
    <main class="w-8/12 mx-auto py-10">
        <h1 class="text-3xl text-gray-600 uppercase font-bold mb-8">
            {{ $title }} propiedad
        </h1>

        <form class="w-full" method="post"
            action="{{ route('properties.update', ['locale' => App::currentLocale(), 'id' => $property->id]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

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
                        Titulo
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
                        value="{{ old('title') ?? $property->title }}" id="title" type="text" name="title"
                        required />
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
                            Precio
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
                            value="{{ old('price') ?? $property->price }}" id="price" type="number"
                            name="price" min="0" step="1" required />
                        @error('price')
                            <div class=" text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="w-4/12 self-end">
                        <div class="relative">
                            <label
                                class="
                                block
                                uppercase
                                tracking-wide
                                text-gray-700 text-xs
                                font-bold
                                mb-2
                            "
                                for="currency">
                                Moneda
                            </label>
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
                                value="{{ old('currency') }}" id="currency" name="currency" required>
                                <option value="USD" {{ $property->currency == 'USD' ? 'selected' : '' }}>USD
                                </option>
                                <option value="EAU" {{ $property->currency == 'EAU' ? 'selected' : '' }}>
                                    {{ __('EAU') }}</option>
                                <option value="MXN" {{ $property->currency == 'MXN' ? 'selected' : '' }}>MXN
                                </option>
                                <option value="CLP" {{ $property->currency == 'CLP' ? 'selected' : '' }}>CLP
                                </option>
                                <option value="PAB" {{ $property->currency == 'PAB' ? 'selected' : '' }}>PAB
                                </option>
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
                        Ubicación
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
                        value="{{ old('location') ?? $property->location }}" id="location" type="text"
                        name="location" required />
                    @error('location')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="hidden flex-wrap -mx-3 mb-9">
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
                        Operación
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
                            <option value="1" {{ $property->operation == '1' ? 'selected' : '' }}>Arriendo
                            </option>
                            <option value="2" {{ $property->operation == '2' ? 'selected' : '' }}>Venta</option>
                            <option value="3" {{ $property->operation == '3' ? 'selected' : '' }}>Venta y
                                arriendo
                            </option>
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
                        for="grid-state">
                        Tipo de propiedad
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
                                    @error('property_type') border-red-500 @enderror
                                "
                            value="{{ old('property_type') }}" id="grid-state" name="property_type" required>
                            <option selected disabled hidden></option>

                            {{-- Print options for each property type --}}
                            @foreach ($property_types as $type)
                                <option value="{{ $type->id }}"
                                    {{ $property->property_type_id == $type->id ? 'selected' : '' }}>
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
                        @error('property_type')
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
                        for="grid-state">
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
                                    @error('country') border-red-500 @enderror"
                            id="grid-state" name="country" required>
                            <option selected disabled hidden></option>

                            {{-- Print options for each country --}}
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}"
                                    {{ $property->country_id == $country->id ? 'selected' : '' }}>
                                    {{ $country->nombre }}</option>
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
                    @error('country')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-9">
                <div class="w-full md:w-1/4 px-3">
                    <label
                        class="
                                block
                                uppercase
                                tracking-wide
                                text-gray-700 text-xs
                                font-bold
                                mb-2
                            "
                        for="area">
                        Área
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
                                @error('area') border-red-500 @enderror
                            "
                        value="{{ old('area') ?? $property->area }}" id="area" type="number" name="area"
                        min="0" step="1" required />
                    @error('area')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-full md:w-1/4 px-3">
                    <label
                        class="
                                block
                                uppercase
                                tracking-wide
                                text-gray-700 text-xs
                                font-bold
                                mb-2
                            "
                        for="bedrooms">
                        Recamaras
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
                                @error('bedrooms') border-red-500 @enderror
                            "
                        value="{{ old('bedrooms') ?? $property->bedrooms }}" id="bedrooms" type="number"
                        name="bedrooms" min="0" step="1" required />
                    @error('bedrooms')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-full md:w-1/4 px-3">
                    <label
                        class="
                                block
                                uppercase
                                tracking-wide
                                text-gray-700 text-xs
                                font-bold
                                mb-2
                            "
                        for="bathrooms">
                        Baños
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
                                @error('bathrooms') border-red-500 @enderror
                            "
                        value="{{ old('bathrooms') ?? $property->bathrooms }}" id="bathrooms" type="number"
                        name="bathrooms" min="0" step="1" required />
                    @error('bathrooms')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-full md:w-1/4 px-3">
                    <label
                        class="
                                block
                                uppercase
                                tracking-wide
                                text-gray-700 text-xs
                                font-bold
                                mb-2
                            "
                        for="parking">
                        Estacionamientos
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
                                @error('parking_lots') border-red-500 @enderror
                            "
                        value="{{ old('parking_lots') ?? $property->parking_lots }}" id="parking" type="number"
                        name="parking_lots" min="0" step="1" required />
                    @error('parking_lots')
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
                        Descripción
                    </label>
                    <textarea id="editor" name="description" required>{{ old('description') ?? $property->description }}</textarea>
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
                        Descripción - Inglés
                    </label>
                    <textarea id="editor2" name="description_translated" required>{{ old('description_translated') ?? $property->description_translated }}</textarea>
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
                        Mapa
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
                        id="map" name="map" required>{{ old('map') ?? $property->map }}</textarea>
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
                        Miniatura
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
                        name="thumbnail" accept="images/*" />
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
                        Imágenes
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
                        value="{{ old('images') }}" aria-describedby="images" id="images" type="file"
                        name="images[]" multiple="true" accept="images/*" />
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
                    Enviar
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
