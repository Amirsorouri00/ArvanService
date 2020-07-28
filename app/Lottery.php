<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Helper\RandomHelper;
use Illuminate\Support\Facades\Redis;
use App\Exceptions\Handler;



class Lottery extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'capacity', 'stream_id', 'lottery_ends_at'
    ];

    protected $guarded = ['id'];
    

    /**
     * Get the stream that lottery if defined for.
     */
    public function stream()
    {
        return $this->belongsTo('App\Stream');
    }

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $attributes
     * @return static
     */
    public static function create(array $attributes = [], $capacity)
    {
        $code = RandomHelper::quickRandom();
        
        $attributes['code'] = $code;
        $attributes['stream_id'] = 1; //Just for test
        // Just for test
        $attributes['lottery_ends_at'] = date("Y-m-d H:i:s", strtotime("+1 hours +30 minutes")); // Just for test

        // 5400 s === 1h + 30 m Just for test
        Redis::setEx($code, 5400, $capacity);

        try {
            $model = new static($attributes);
            $model->save();
        } catch (Throwable $e) { // App\Exception\Handler@report...
            $resp = Redis::del($code);
            Handler::report($e);
            return false;
        }
        return $model;
    }

    /**
     * Update the model in the database.
     *
     * @param  array  $attributes
     * @param  array  $options
     * @return bool
     */
    public function update(array $attributes = [], $options = [])
    {
        if ($options['capacity']) {
            // requires redislock
            Redis::set($this->code, $options['capacity']); // Readme
        }
        if (! $this->exists) {
            return false;
        }

        return $this->fill($attributes)->save();
    }
}
