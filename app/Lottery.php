<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Helper\RandomHelper;
use Illuminate\Support\Facades\Redis;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\Cache;


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
     * Test OK
     * Save a new model and return the instance.
     *
     * @param  array  $attributes
     * @return static
     */
    public static function create(array $attributes = [], $capacity)
    {
        $code = RandomHelper::quickRandom();
        
        $attributes['code'] = $code;
        // Just for test
        $attributes['stream_id'] = 1; 
        $attributes['lottery_ends_at'] = date("Y-m-d H:i:s", strtotime("+1 hours +30 minutes")); // Just for test

        // 5400 s === 1h + 30 m Just for test
        Redis::setEx($code, 5400, $capacity);

        try {
            $model = new static($attributes);
            $model->save();
        } catch (Throwable $e) { 
            $resp = Redis::del($code);
            Handler::report($e);
            return false;
        }
        return $model;
    }

    /**
     * Test OK
     * Update the model in the database.
     *
     * @param  array  $attributes
     * @param  array  $options
     * @return bool
     */
    public function update(array $attributes = [], $options = [])
    {
        if (!$this->exists) {
            return false;
        }

        if ($options['capacity']) {
            // requires redislock
            $lock = Cache::lock('attendees', 1);
            $ttl = Redis::ttl($lotteryCode);
            if ($lock->get()) {
                Redis::setEx($lotteryCode, $ttl, $options['capacity']);
                $lock->release();
            }
            else {
                return false;
            }
        }
        return $this->fill($attributes)->save();
    }
}
