<?php

namespace App\Http\Traits;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

trait HttpResponsesTrait
{

    public function __construct()
    {

    }

    protected function success($message, $data = [],$meta = [], $status = Response::HTTP_OK)
    {
        return response([
            'success' => true,
            'message' => $message,
            'data' => $data,
            'meta' => $meta,
        ], $status);
    }

    protected function failure($message, $status = ResponseAlias::HTTP_BAD_REQUEST)
    {
        return response([
            'success' => false,
            'message' => $message,
        ], $status);
    }

}
