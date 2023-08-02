<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tithe extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'date',
        'member_id'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
