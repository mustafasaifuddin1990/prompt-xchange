<?php

namespace App\Models;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'slug'];

    // One Category can have many Blogs
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
