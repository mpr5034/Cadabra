<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function respondWithError($code, $message)
    {
        return $this->respondWith(['status' => 'error','code' => $code,'message' => $message]);
    }

    public function respondWith($values)
    {
        return response()->json([
            'status' => $values['status'],
            'code' => $values['code'],
            'message' => $values['message']
        ]);

    }

    public function respondWithSuccess($code, $message)
    {
        return $this->respondWith(['status' => 'success','code' => $code,'message' => $message]);
    }
}
