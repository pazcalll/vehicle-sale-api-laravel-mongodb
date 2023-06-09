<?php

use Illuminate\Http\JsonResponse;

if (!function_exists('respondWithMessage')) {
    function respondWithMessage(string $message = 'Success', int $status = 200) : JsonResponse {
        return response()->json([
            'message' => $message
        ], $status);
    }
}

if (!function_exists('respondWithData')) {
    function respondWithData($data, string $message = '', int $status = 200) : JsonResponse {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $status);
    }
}