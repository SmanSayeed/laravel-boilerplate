<?php

namespace App\Traits;
use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    protected function successResponse($data = null, $message = 'Success', $code = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
            'errors'=>null
        ], $code);
    }

    protected function errorResponse($errors=null,$message = 'Error', $code = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data'=>null,
            'errors'  => $errors,
        ], $code);
    }
}
