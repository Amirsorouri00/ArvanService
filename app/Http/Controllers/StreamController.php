<?php

namespace App\Http\Controllers;

use App\Http\Requests\StreamRequest;
use App\Stream;

class StreamController extends Controller
{
    public function index()
    {
        $streams = Stream::latest()->get();

        return response(['data' => $streams ], 200);
    }

    /**
     * Test Ok
     * @param App\Requests\StreamRequest
     * @return JsonResponse
     */
    public function store(StreamRequest $request)
    {
        $stream = Stream::create($request->all());
        return response(['data' => $stream ], 201);
    }

    public function show($id)
    {
        $stream = Stream::findOrFail($id);

        return response(['data', $stream ], 200);
    }

    /**
     * Test Ok
     * @param App\Requests\StreamRequest
     * @return JsonResponse
     */
    public function update(StreamRequest $request, $id)
    {
        $stream = Stream::findOrFail($id);
        $stream->update($request->all());

        return response(['data' => $stream ], 200);
    }

    public function destroy($id)
    {
        Stream::destroy($id);

        return response(['data' => null ], 204);
    }
}
