<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

/**
 * Demo api doc with http://apidocjs.com/
 *
 * @apiDefine RequireAuthHeader
 *
 * @apiHeader {String} Authorization Authorization Bearer token after login
 * @apiHeaderExample {json} Header-Example:
 * {
 *     "Authorization": "Bearer jwt-token-after-login"
 * }
 */

class BaseController extends Controller
{
    protected function responseError(
        $errorCode = null,
        $errors = [],
        $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY
    ) {
        if (is_string($errors)) {
            $errors = ['message' => $errors];
        }

        return response()->json([
            'code' => $errorCode,
            'errors' => $errors,
        ], $statusCode);
    }

    protected function responseStoreSuccess($data = null)
    {
        return response()->json($data, Response::HTTP_CREATED);
    }

    protected function responseUpdateSuccess($data = null)
    {
        return response()->json($data, Response::HTTP_OK);
    }
}
