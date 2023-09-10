<?php
namespace App\traits;
trait response{
    protected function successResponse($data, $code, $message = null): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => '',
            'data' => $data
        ], $code);
    }

    protected function errorResponse($message,$code): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => ''
        ], $code);
    }
}
