<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuxuryTypes extends Model
{
    use HasFactory;

    public $table = 'luxury_types';

    public function luxury() {
        $this->belongsTo(Luxury::class, 'luxury_type');
    }
}
