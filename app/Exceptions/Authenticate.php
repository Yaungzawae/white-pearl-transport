<?php

namespace App\Exceptions;
use Illuminate\Auth\AuthenticationException;

use Exception;

class Authenticate extends Exception
{
    //
    public function handle($request, AuthenticationException $exception)
    {
        if ($request()->expectsJson()) {
            return Response()->json(['error' => 'UnAuthorized'], 401); //exeption for api
        }

        $guard = data_get($exception->guards(), 0);
        switch ($guard) {
            case 'driver':
                $login = 'driver.login';
                break;
            default:
                $login = 'login';
                break;
        }
        return redirect()->guest(route($login));
    }
}
