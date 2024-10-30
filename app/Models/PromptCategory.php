<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromptCategory extends Model
{
    use HasFactory;
    protected $table = 'prompt_categories';
    protected $fillable = ['category_name', 'slug'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
