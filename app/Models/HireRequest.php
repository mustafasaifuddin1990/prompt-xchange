<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HireRequest extends Model
{
    use HasFactory;


    protected $fillable = [
        'general_user_id',
        'content_creator_id',
        'status',
    ];

    public function contentCreator()
    {
        return $this->belongsTo(User::class, 'content_creator_id'); // Ensure correct foreign key
    }

    public function generalUser()
    {
        return $this->belongsTo(User::class, 'general_user_id'); // Ensure correct foreign key
    }
}
