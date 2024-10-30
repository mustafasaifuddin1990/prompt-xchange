<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'price',
        'features',
    ];

    // Accessor and Mutator for the JSON features field
    protected $casts = [
        'features' => 'array',
    ];
}
