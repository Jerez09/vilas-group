<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Property;
use App\Models\Property_Type;

class CreatePropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $countries = Country::all();
        $property_types = Property_Type::all();

        return view('pages.properties.create', [
            'title' => 'Crear',
            'countries' => $countries,
            'property_types' => $property_types
        ]);
    }

    public function show($language, $id)
    {
        $property = Property::find($id);
        $countries = Country::all();
        $property_types = Property_Type::all();

        return view('pages.properties.edit', [
            'title' => 'Editar',
            'property' => $property,
            'countries' => $countries,
            'property_types' => $property_types
        ]);
    }
}
