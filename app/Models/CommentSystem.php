<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CommentSystem extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = [
        'id',
      'user_id',
      'post_id',
      'parent_id',
      'comment',
      "sub_parent_id"
    ];

    protected $appends = [
        'time_ago'
    ];
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
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function parent() {
        return $this->belongsTo(CommentSystem::class, 'parent_id', 'id');
    }
    public function subParent()
    {
        return $this->belongsTo(CommentSystem::class, 'sub_parent_id', 'id');
    }

    public function replies() {
        return $this->hasMany(CommentSystem::class, 'parent_id')
            ->with('user:id,name,user_picture');
    }

    public function nestedReplies()
    {
        return $this->hasMany(CommentSystem::class, 'sub_parent_id')
            ->with(['user:id,name,user_picture', 'replies']);
    }

    public function comments_likes(){
        return $this->hasMany(Likes::class, 'comment_ids', 'id');
    }


    public static function get_main_comments($post_id, $perPage = 5, $user_id)
    {
        $currentUserId = $user_id;
        // Get the main comments that have no parent
        return self::with(['user:id,name,user_picture',
            'comments_likes' => function ($query) use ($currentUserId) {
                // Filter likes for the current user only
                $query->where('user_id', $currentUserId);
            }

        ])
            ->withCount('replies')
            ->whereNull('parent_id')
            ->where('post_id', $post_id)
            ->orderBy('created_at', 'asc')
            ->paginate($perPage);
    }

    public static function get_replies_for_comment($comment_id, $user_id, $perPage = 1)
    {
        $currentUserId = $user_id;
        // Get replies for the specific comment
        return self::with(['user:id,name,user_picture', 'replies.user:id,name,user_picture',
            'comments_likes' => function ($query) use ($currentUserId) {
                // Filter likes for the current user only
                $query->where('user_id', $currentUserId);
            }
        ])
            ->where('parent_id', $comment_id)
            ->orderBy('created_at', 'asc')
            ->paginate($perPage);
    }

    public static function get_specific_comment($id, $user_id)
    {
        $currentUserId = $user_id;
        // Get the main comments that have no parent
        return self::with(['user:id,name,user_picture',
            'comments_likes' => function ($query) use ($currentUserId) {
                // Filter likes for the current user only
                $query->where('user_id', $currentUserId);
            }
            ])
            ->withCount('replies')
            ->whereNull('parent_id')
            ->where('id', $id)
            ->first();
    }

    public static function get_specif_reply_for_comment($id)
    {
        $currentUserId = auth()->id();
        // Get replies for the specific comment
        return self::with(['user:id,name,user_picture', 'replies.user:id,name,user_picture',
            'comments_likes' => function ($query) use ($currentUserId) {
                // Filter likes for the current user only
                $query->where('user_id', $currentUserId);
            }
        ])
            ->where('id', $id)
            ->first();
    }
}
