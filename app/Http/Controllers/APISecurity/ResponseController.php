<?php

namespace App\Http\Controllers\APISecurity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResponseController extends Controller
{
    public function sendResponse($response)
    {
        return response()->json($response, 200);
    }


    public function sendError($error, $code = 404)
    {
    	$response = [
            'error' => $error,
        ];
        return response()->json($response, $code);
    }
}
