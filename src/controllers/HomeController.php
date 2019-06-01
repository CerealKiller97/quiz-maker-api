<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function home($request, $response)
    {
        return $this->ok($response, [
            'message' => 'Api online...'
        ]);
    }
}
