<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeedbackRequest;
use Symfony\Component\HttpFoundation\JsonResponse;


class FeedbackController extends Controller
{
    public function store(StoreFeedbackRequest $request): JsonResponse
    {
        $data = $request->validated();

        return response()->json([
            'ok' => true,
            'data' => $data,
            'message' => 'Feedback accepted',
        ], 201);
    }
}
