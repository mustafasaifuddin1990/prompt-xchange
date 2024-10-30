<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;
    protected $table = 'messages';

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'content',
        'seen'
    ];
    protected $appends = [
        "time_ago"
    ];

    public function sender(){
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
    public function getTimeAgoAttribute()
    {
        $now = Carbon::now();
        $createdAt = $this->created_at;

        // Check if it's today
        if ($createdAt->isToday()) {
            return $createdAt->format('g:i a');
        }

        // Check if it's yesterday
        if ($createdAt->isYesterday()) {
            return 'Yesterday ';
        }

        // Check if it's within this week
        if ($createdAt->greaterThan($now->subDays(7))) {
            return $createdAt->format('l g:i a'); // Day of the week, e.g., 'Monday 3:45 pm'
        }

        // Otherwise, show the date and time
        return $createdAt->format('M, Y'); // e.g., 'Aug, 2024'
    }
    public static function get_messages_between_two_users($request ,$receiver_id, $sender_id)
    {
        $query = self::with(['sender', 'receiver'])
            ->where(function ($q) use($request, $receiver_id, $sender_id) {
                $q->where(function ($sub) use($receiver_id, $sender_id) {
                    $sub->where('sender_id', $sender_id)
                        ->Where('receiver_id', $receiver_id);
                })
                    ->orwhere(function ($sub) use($receiver_id, $sender_id) {
                        $sub->where('receiver_id', $sender_id)
                            ->Where('sender_id', $receiver_id);
                    });
            });
        return $query;
    }
}
