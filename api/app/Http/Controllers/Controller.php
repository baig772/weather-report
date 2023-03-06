<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function makeSuccessResponse($message, $data, $code = ResponseAlias::HTTP_OK): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'payload' => $data
        ], $code);
    }

    public function makeFailureResponse($message, $errors = [], $code = ResponseAlias::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'errors' => $errors
        ], $code);
    }
}
