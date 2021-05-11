<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = ['id'];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
