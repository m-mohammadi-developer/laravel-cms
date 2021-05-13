<?php

namespace App;

use App\Post;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {   
        $this->attributes['password'] = bcrypt($value);
    }

    public function getAvatarAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    public function userHasRole($role_name)
    {
        foreach ($this->roles as $role) {
            if ($role_name === $role->name) 
                return true;
        }

        return false;
    }
}
