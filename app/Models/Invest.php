<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invest extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class, 'id', 'country_id');
    }

    protected $fillable = [
        'country_id',
        'text'
    ];
}
