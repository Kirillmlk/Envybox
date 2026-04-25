<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FeedbackController;

Route::post('/feedback', [FeedbackController::class, 'store']);

