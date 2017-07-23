<?php

namespace App\Http\Middleware;

use App\ApiKey;
use Closure;

class SimpleAuthentication
{
    public function handle($request, Closure $next)
    {
        $hasUsername = !!env('ADMIN_USER', false);
        $hasPassword = !!env('ADMIN_PASSWORD', false);

        if ( ($hasUsername && $hasPassword) && ($request->getUser() !== env('ADMIN_USER') && $request->getPassword() !== env('ADMIN_PASSWORD'))) {
            $headers = array('WWW-Authenticate' => 'Basic');

            return response('Unauthorized', 401, $headers);
        }

        return $next($request);
    }
}
