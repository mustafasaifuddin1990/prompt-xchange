<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileViews extends Model
{
    use HasFactory;
    protected $table = 'profile_view';

    protected $fillable = [
        'user_id',
        'profile_id',
        'view',
        'id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
