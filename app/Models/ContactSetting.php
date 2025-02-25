<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    use HasFactory;

    protected $fillable = ['phone', 'email', 'heading', 'placeholders'];

    protected $casts = [
        'placeholders' => 'array',
    ];
}
