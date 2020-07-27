<?php

namespace App\Http\Controllers;

use App\Http\Requests\LotteryRequest;
use App\Lottery;
use Carbon\Carbon;


class LotteryController extends Controller
{
    public function index()
    {
        $lotteries = Lottery::latest()->get();

        return response(['data' => $lotteries ], 200);
    }

    /**
     * Test Ok
     * @param App\Requests\LotteryRequest
     * @return JsonResponse
     */
    public function store(LotteryRequest $request)
    {
        $capacity = $request->input('capacity');
        $lottery = Lottery::create($request->all(), $capacity);

        return response(['data' => $lottery], 201);
    }

    public function show($id)
    {
        $lottery = Lottery::findOrFail($id);

        return response(['data', $lottery ], 200);
    }

    /**
     * Test Ok
     * @param App\Requests\LotteryRequest, App::Lottery()->id
     * @return JsonResponse
     */
    public function update(LotteryRequest $request, $id)
    {
        $lottery = Lottery::findOrFail($id);
        $option = [];
        $option['capacity'] = $request->input('capacity');
        $resp = $lottery->update($request->all(), $option);

        return response(['data' => $lottery ], 200);
    }

    public function destroy($id)
    {
        Lottery::destroy($id);

        return response(['data' => null ], 204);
    }
}
