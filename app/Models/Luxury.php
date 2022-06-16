<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luxury extends Model
{
    use HasFactory;

    public $table = 'luxuries';

    public $timestamps = false;
    
    public function country()
    {
        return $this->belongsTo(Country::class, 'id', 'country_id');
    }

    public function luxury_type()
    {
        return $this->hasOne(LuxuryTypes::class, 'id', 'luxury_type_id');
    }

    protected $fillable = [
        'slug',
        'title',
        'title_translated',
        'price',
        'currency',
        'description',
        'country_id',
        'luxury_type_id',
        'description_translated',
        'location',
        'map',
        'operation',
        'thumbnail',
        'images'
    ];

    protected $casts = [
        'images' => 'array'
    ];
}
