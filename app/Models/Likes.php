<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;
    protected $table = 'likes';

    protected $fillable = [
        'id',
        'user_id',
        'post_id',
        'item_type',
        'comment_ids',
        'liked'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }



    public function comments(){
        return $this->belongsTo(CommentSystem::class,'comment_ids','id');
    }
}
