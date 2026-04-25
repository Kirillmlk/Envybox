<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeedbackRequest;
use App\Services\Feedback\Factories\SaverFactory;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;


class FeedbackController extends Controller
{
    /**
     * @param StoreFeedbackRequest $request
     * @return JsonResponse
     * @throws \InvalidArgumentException|Exception
     */
    public function store(StoreFeedbackRequest $request): JsonResponse
    {
        $data = $request->validated();

        $saver = (new SaverFactory())->make($data['channel']);
        $saver->save($data);

        return response()->json([
            'ok' => true,
            'data' => $data,
            'message' => 'Feedback accepted',
        ], 201);
    }
}
