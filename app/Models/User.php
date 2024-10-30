<?php

namespace App\Models;
use App\Models\Role;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Likes;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_picture',
        'user_slug',
        'phone',
        'country',
        'city',
        'state'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        return $this->roles()->where('slug', $role)->exists();
    }

    public function user_likes(){
        return $this->hasMany(Likes::class,  'post_id', 'id');
    }

    public function heartLikesCount() {
        return $this->user_likes()->where('liked', 'heart')->count();
    }

    public function hireRequests()
    {
        return $this->hasMany(HireRequest::class, 'content_creator_id');
    }

    public function sentHireRequests()
    {
        return $this->hasMany(HireRequest::class, 'general_user_id');
    }



    public function Profile_view()
    {
        return $this->hasOne(ProfileViews::class, 'user_id', 'id');
    }

    public function comment_system(){
        return $this->hasMany(CommentSystem::class, 'user_id', 'id');
    }


    public function all_notifications(){
        return $this->hasMany('App\Models\NotificationCenter');
    }

    public function sentMessages()
    {
        return $this->hasMany(Messages::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Messages::class, 'receiver_id');
    }

}
