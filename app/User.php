<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verified_at', 'updated_at', 'created_at', 'username'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The users that belong to the Lottery.
     */
    public function users()
    {
        return $this->belongsToMany('App\Lottery');
    }

    public static function report($values) {
        $phoneNumbers = array();

        foreach ($values as $value) {
            list($lottery, $phoneNumber, $lotteryCode) = explode(':', $value);
            if(!in_array($phoneNumber, $phoneNumbers, true)) {
                array_push($phoneNumbers, $phoneNumber);
            }
        }

        $users = User::select('*')->whereIn('phone', $phoneNumbers)->get();
        return $users;
    }
}
