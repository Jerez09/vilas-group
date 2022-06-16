<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public $table = 'countries';

    public function property() {
        return $this->hasMany(Property::class);
    }

    public function luxury() {
        return $this->hasMany(Luxury::class);
    }

    public function invest() {
        return $this->hasMany(Invest::class);
    }
}
