<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * @return mixed
     */
    public function toResponse($request)
    {
        $home = Auth::user()->is_admin ? '/dashboard' : '/';

        return redirect()->intended($home);
    }
}
