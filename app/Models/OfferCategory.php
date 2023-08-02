<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_offer'
    ];

    public function offer()
    {
        return $this->hasMany(Offer::class);
    }
}
