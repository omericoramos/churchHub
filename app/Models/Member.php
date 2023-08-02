<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'birth_date',
        'affiliation_date'
    ];

    public function tithe()
    {
        return $this->hasMany(Tithe::class);
    }
}
