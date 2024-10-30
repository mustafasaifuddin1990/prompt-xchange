<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromptGeneration extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id',
        'model_name',
        'positive_prompt',
        'negative_prompt',
        'samples',
        'steps',
         'price',         // Add price to the fillable array
         'category',      // Add category to the fillable array
    ];

    public function generatedImages()
    {
        return $this->hasMany(GeneratedImage::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function promptCategory()
    {
        return $this->belongsTo(PromptCategory::class, 'category'); // Ensure 'category_id' is the foreign key in your PromptGeneration table
    }

}
