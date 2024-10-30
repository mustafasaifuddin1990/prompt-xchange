<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_users extends Model
{
    use HasFactory;
    protected $table = 'request_chat';

    protected $fillable = [
        'user_id',
        'vendor_id',
        'status',
        'count_request'
    ];

    public function user_details(){
        return $this->belongsTo(User::class,'vendor_id','id');

    }
}
