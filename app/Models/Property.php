<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public $table = 'properties';

    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class, 'id', 'country_id');
    }

    public function property_type()
    {
        return $this->hasOne(Property_Type::class, 'id', 'property_type_id');
    }

    protected $fillable = [
        'title',
        'title_translated',
        'slug',
        'price',
        'currency',
        'location',
        'operation',
        'country_id',
        'property_type_id',
        'area',
        'bedrooms',
        'bathrooms',
        'parking_lots',
        'description',
        'description_translated',
        'map',
        'thumbnail',
        'images',
    ];

    protected $casts = [
        'images' => 'array'
    ];
}
