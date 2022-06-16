<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|unique:properties',
            'price' => 'required|numeric',
            'currency' => 'required|string',
            'location' => 'required|string',
            'operation' => 'required|string',
            'country_id' => 'required',
            'property_type_id' => 'required',
            'area' => 'required|numeric',
            'bedrooms' => 'required|numeric',
            'bathrooms' => 'required|numeric',
            'parking_lots' => 'required|numeric',
            'description' => 'required|string|max:5000',
            'description_translated' => 'required|string|max:5000',
            'map' => 'required|string|max:2000',
            'thumbnail' => 'required|image',
            'images' => 'required|max:1024'
        ];
    }
}
