<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeedbackRequest;
use App\Services\Feedback\Savers\DatabaseSaver;
use Symfony\Component\HttpFoundation\JsonResponse;


class FeedbackController extends Controller
{
    public function store(StoreFeedbackRequest $request): JsonResponse
    {
        $data = $request->validated();

        $saver = (new DatabaseSaver())->make($data['channel']);
        $saver->save($data);

        return response()->json([
            'ok' => true,
            'data' => $data,
            'message' => 'Feedback accepted',
        ], 201);
    }
}
