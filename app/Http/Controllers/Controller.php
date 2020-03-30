<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse( $data, $message, $code = 200 )
    {
        $response =  [
            'success'   => true,
            'data'      => $data,
            'message'   => $message,
        ];

        return Response::json( $response, $code );
    }

    public function sendError( $message, $errors = null, $code = 404 )
    {
        $response = [
            'success'   => false,
            'errors'    => $errors,
            'message'   => $message,
        ];

        return Response::json( $response, $code );
    }
}
