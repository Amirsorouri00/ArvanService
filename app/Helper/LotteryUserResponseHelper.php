<?php

namespace App\Helper;


class LotteryUserResponseHelper 
{
   
    /**
     * return critical section time response string
     *
     * @param  str  $startTime $endTime
     * @return string
     */
    public static function criticalSectionTime($endTime, $startTime)
    {
        return 'Critical Section of the service took: '.($endTime - $startTime);
    }

    /**
     * return critical section time response string
     *
     * @param  int  $statusCode 
     * @return string
     */
    public static function statusCodeResponse($statusCode) {
        if ($statusCode == 201) {
            # code...
            return 'Succeed';
        }
        elseif ($statusCode == 202) {
            # code...
        }
        elseif ($statusCode == 203) {
            # code...
            return 'You\'ve been already take part in this lottery before.';
        }
        elseif ($statusCode == 206) {
            # code...
            return 'Something Went Wrong(1.Redis server connection broken 2.Multiple request at from one user at the same time.). Please try again!';
        }
        elseif ($statusCode == 205) {
            # code...
            return 'Oops! Please try another time.';
        }
        elseif ($statusCode == 204) {
            # code...
            return 'Unfortunately this lottery is not active anymore.';
        }
        else {
            return 'Unknown.';
        }
    }
}



