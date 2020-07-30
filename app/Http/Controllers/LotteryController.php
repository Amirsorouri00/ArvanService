<?php

namespace App\Http\Controllers;

use App\Http\Requests\LotteryRequest;
use App\Lottery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;


class LotteryController extends Controller
{
    /**
     * Get latest lotteries created.
     * @param App\Requests\LotteryRequest
     * @return JsonResponse
     * Test Ok
     */
    public function index()
    {
        $lotteries = Lottery::latest()->get();

        return response(['data' => $lotteries ], 200);
    }

    /**
     * Create lottery
     * @param App\Requests\LotteryRequest
     * @return JsonResponse
     * Test Ok
     */
    public function store(LotteryRequest $request)
    {
        $capacity = $request->input('capacity');
        $lottery = Lottery::create($request->all(), $capacity);

        return response(['data' => $lottery], 201);
    }

    /**
     * Get specific lottery by $id
     * @param App\Requests\LotteryRequest
     * @return JsonResponse
     * Test Ok
     */
    public function show($id)
    {
        $lottery = Lottery::findOrFail($id);

        return response(['data', $lottery ], 200);
    }

    /**
     * Update lottery
     * @param App\Requests\LotteryRequest, App::Lottery()->id
     * @param int lottry_id, App::Lottery()->id
     * @return JsonResponse
     * Test Ok
     */
    public function update(LotteryRequest $request, $id)
    {
        $lottery = Lottery::findOrFail($id);
        $option = [];
        $option['capacity'] = $request->input('capacity');
        $resp = $lottery->update($request->all(), $option);

        return response(['data' => $lottery ], 200);
    }


    /**
     * Remove lottery
     * @param int lottry_id, App::Lottery()->id
     * @return JsonResponse
     * Test Ok
     */
    public function destroy($id)
    {
        Lottery::destroy($id);

        return response(['data' => null ], 204);
    }
}
