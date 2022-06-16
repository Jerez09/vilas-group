<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLuxuryRequest extends FormRequest
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
            'title' => 'required|string|unique:luxuries',
            'price' => 'required|numeric',
            'currency' => 'required|string',
            'location' => 'required|string',
            'country_id' => 'required',
            'luxury_type_id' => 'required',
            'operation' => 'required|string',
            'description' => 'required|string|max:5000',
            'description_translated' => 'required|string|max:5000',
            'map' => 'required|string|max:2000',
            'thumbnail' => 'required|image',
            'images' => 'required|max:1024'
        ];
    }
}
