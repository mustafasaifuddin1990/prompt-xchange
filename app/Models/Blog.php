<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'slug', 'image', 'content', 'publish_date', 'reading_time' ,'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
