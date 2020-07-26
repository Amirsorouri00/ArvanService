<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
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
