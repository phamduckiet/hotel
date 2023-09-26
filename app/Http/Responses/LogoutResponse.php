<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class LogoutResponse implements LogoutResponseContract
{
    /**
     * @return mixed
     */
    public function toResponse($request)
    {
        return redirect()->route('login');
    }
}
