<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Note extends Model
{
    protected $fillable = [
 
        'title', 'body', 'user_id',
 
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
