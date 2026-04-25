<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class FeedbackController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        return response()->json([
            'message' => 'Feedback endpoint works',
        ]);
    }
}
