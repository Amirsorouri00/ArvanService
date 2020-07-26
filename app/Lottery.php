<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'capacity',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'stream_id',
    ];
    

    /**
     * Get the stream that lottery if defined for.
     */
    public function stream()
    {
        return $this->belongsTo('App\Stream');
    }
}
