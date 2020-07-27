<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Stream extends Model
{
    protected $guarded = ['id'];

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
    ];

    /**
     * Get the lotteries for the stream.
     */
    public function lotteries()
    {
        return $this->hasMany('App\Lottery');
    }
}
