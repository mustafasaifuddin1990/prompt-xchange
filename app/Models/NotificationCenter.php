<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class NotificationCenter extends Model
{
    use HasFactory;

    protected $table = 'notification_center';
    protected $fillable = [
        'category_id',
        'service_id',
        "sender_id",
        "receiver_id",
        "message",
        'status',
        'seen',
        'All_count',
        'id'
    ];

    public function notifications_sendor(){

        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function notifications_reciever(){

        return $this->belongsTo(User::class, 'id', 'receiver_id');
    }

    protected $appends = [
        "time_ago"
    ];

    public function sender(){
        return $this->belongsTo(User::class,'id', 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class,'id', 'receiver_id');
    }

    public function getTimeAgoAttribute(){
        return $this->created_at->diffForHumans();
    }

    public static function get_notification_between_two_users($user_id)
    {
        $get_data = self::with(['notifications_sendor:id,name,user_picture'])
            ->where('receiver_id', $user_id);
        return $get_data;
    }

}
