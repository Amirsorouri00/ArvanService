<?php

namespace App\Http\Controllers;

use App\Lottery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\LotteryRequest;
use Illuminate\Support\Facades\Cache;
use App\Exceptions\AlreadyAttendedInLotteryException;
use Illuminate\Database\QueryException;

class LotteryUserController extends Controller
{
    public function report(LotteryRequest $request)
    {
        $lotteryCode = $request->input('lottery_code');
        $values = array();
        try {
            $values = Redis::keys('lottery:*:'.$lotteryCode);
        } catch (\Throwable $exception) {
            throw $exception;
        }
        
        $phoneNumbers = array();

        if (is_null($values)) {
            return response(['data' => []], 200);
        }

        foreach ($values as $value) {
            list($lottery, $phoneNumber, $lotteryCode) = explode(':', $value);
            array_push($phoneNumbers, $phoneNumber);
        }

        return response(['data' => $phoneNumbers], 200);
    }


    /**
     * Test OK
     * @param App\Requests\LotteryRequest
     * @return JsonResponse
     */
    public function attend(LotteryRequest $request)
    {
        $phoneNumber = $request->input('phone');
        $lotteryCode = $request->input('lottery_code');

        if (1 == Redis::exists('lottery:'.$phoneNumber.':'.$lotteryCode)) {
            return response(['error' => 'You\'ve been already take part in this lottery before.'], 406);
        }
        else{
            // Lock acquired for 1 seconds...
            $starttime = microtime(true);
            $lock = Cache::lock('attendees', 1);
            if ($lock->get()) {
                $value = Redis::get($lotteryCode);
                $ttl = Redis::ttl($lotteryCode);

                if($value > 0 && $ttl != -1) {
                    // User win scenario
                    try {
                        Redis::setEx($lotteryCode, $ttl, $value-1);
                        
                    } catch (\Throwable $exception) {
                        throw $exception;
                    }

                    try {
                        Redis::set('lottery:'.$phoneNumber.':'.$lotteryCode, 1);
                        $lock->release();
                        $endtime = microtime(true);
                        return response(['data' => 'You Win.'.($endtime - $starttime)], 201);
                    } catch (\Throwable $exception) {
                        Redis::setEx($lotteryCode, $ttl, $value);
                        $lock->release();
                        
                        throw $exception;
                    }
                }
                else{
                    return response(['error' => 'This lottery is not active anymore.'], 406);
                }
            }
            else {
                return response(['error' => 'We couldn\'t take part in the lottery this time. Please try another time.'], 423);
            }
        }
    }
}
