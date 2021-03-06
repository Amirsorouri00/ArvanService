<?php

namespace App\Http\Controllers;

use App\Lottery;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\LotteryRequest;
use Illuminate\Support\Facades\Cache;
use App\Exceptions\AlreadyAttendedInLotteryException;
use Illuminate\Contracts\Cache\LockTimeoutException;
use Illuminate\Database\QueryException;
use App\Helper\LotteryUserResponseHelper as ResponseHelper;


class LotteryUserController extends Controller
{
    /**
     * Get Lottery Winners(specific/general)
     * @param App\Requests\LotteryRequest
     * @return JsonResponse
     * Test OK
     */
    public function report(LotteryRequest $request)
    {
        $lotteryCode = $request->input('lottery_code');
        $values = array();
        try {
            if (is_null($lotteryCode)) {
                $values = Redis::keys('lottery:*:*');
            }
            else {
                $values = Redis::keys('lottery:*:'.$lotteryCode);
            }
        } catch (\Throwable $exception) {
            // throw $exception;
            return response(['error' => 
                ResponseHelper::statusCodeResponse(205)], 205);
        }
        
        if (is_null($values)) {
            return response(['data' => []], 200);
        }
        $users = User::report($values);
        
        return response(['data' => $users], 200);
    }


    /**
     * Attend in a given Lottery
     * @param phone string The user phoneNo that wants to attend in lottery. Example: 09128048897
     * @param lottery_code string The lottery code which user wants to attend. Example: SvTdsUL9fiiuqryNNvoz
     * @return  {
     *  "data": {},
     * }
     * @param App\Requests\LotteryRequest
     * @return JsonResponse
     * Test OK
     */
    public function attend(LotteryRequest $request)
    {
        $phoneNumber = $request->input('phone');
        $lotteryCode = $request->input('lottery_code');

        $key = 'lottery:'.$phoneNumber.':'.$lotteryCode;
        // Redis::watch($key);

        if (1 == Redis::exists('lottery:'.$phoneNumber.':'.$lotteryCode)) {
            return response(['error' => ResponseHelper::statusCodeResponse(203)], 203);
        }
        elseif (0 == Redis::exists($phoneNumber)) {
            return response(['error' => ResponseHelper::statusCodeResponse(404)], 404);
        }
        else{
            // Lock acquired for 1 seconds...
            $startTime = microtime(true);
            $endTime = microtime(true);
            $lock = Cache::lock('attendees', 1);
            try {
                $lock->block(34);
                if(Redis::get($lotteryCode) > 0) {
                    try {
                        $ret = Redis::multi()->decr($lotteryCode)->set($key, 1)->exec();
                        $lock->release();
                        $endTime = microtime(true);
                        
                        foreach ($ret as $status) { 
                            if (!$status) {
                                return response(['error' => 
                                    ResponseHelper::statusCodeResponse(206), 'critical_section_time' => 
                                    ResponseHelper::criticalSectionTime($endTime,$startTime)], 206);
                            }
                        }
                        return response(['data' => 'You Win.', 'critical_section_time' => 
                            ResponseHelper::criticalSectionTime($endTime,$startTime)], 201);
                        
                    } catch (\Throwable $exception) {
                        // throw $exception;
                        $lock->release();
                        return response(['error' => ResponseHelper::statusCodeResponse(204)], 304);
                    }
                }
                else{
                    $endTime = microtime(true);

                    return response(['error' => ResponseHelper::statusCodeResponse(209), 'critical_section_time' =>
                        ResponseHelper::criticalSectionTime($endTime,$startTime)], 209);
                }
            } catch (LockTimeoutException $e) {
                $endTime = microtime(true);

                return response(['error' => ResponseHelper::statusCodeResponse(205), 'critical_section_time' =>
                    ResponseHelper::criticalSectionTime($endTime,$startTime)], 205);
            } finally {
                optional($lock)->release();
            }
        }
    }
}
