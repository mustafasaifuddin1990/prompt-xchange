<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratedImage extends Model
{
    use HasFactory;
    
      protected $fillable = [
        'prompt_generation_id',
        'image_url',
    ];

    public function promptGeneration()
    {
        return $this->belongsTo(PromptGeneration::class);
    }
}
