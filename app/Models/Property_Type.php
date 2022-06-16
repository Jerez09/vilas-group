<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_Type extends Model
{
    use HasFactory;

    public $table = 'property_types';

    public function property() {
        $this->belongsTo(Property::class, 'property_type');
    }
}
