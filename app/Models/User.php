<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the profiles for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function loginDetail()
    {
        return $this->hasMany(LoginDetail::class, 'user_id');
    }

    /**
     * Get all of the post for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function post(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logoutDetail(): HasMany
    {
        return $this->hasMany(LogoutDetail::class, 'user_id');
    }

    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeofuser(): HasOne
    {
        return $this->hasOne(TypeOfUser::class, 'user_id');
    }


    public function story()
    {
        return $this->hasMany(Story::class, 'user_id');
    }

    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function verify(): HasOne
    {
        return $this->hasOne(Verify::class, 'user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'followed_id');
    }

    public function follow(User $user)
    {
            if (!$this->isFollowing($user)) {
                $this->following()->attach($user->id);
            }
        }

    public function unfollow(User $user)
    {
        $this->following()->detach($user->id);
    }

    public function isFollowing(User $user)
    {
        return $this->following()->where('followed_id', $user->id)->exists();
    }

}
