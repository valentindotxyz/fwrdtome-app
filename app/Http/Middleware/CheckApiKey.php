<?php

namespace App\Http\Middleware;

use App\ApiKey;
use Closure;

class CheckApiKey
{
    public function handle($request, Closure $next)
    {
        if (!$request->has(['api-key'])) {
            return response()->json("Missing API key", 401);
        }

        if (!ApiKey::isValid($request->get('api-key'))) {
            return response()->json("Invalid API key", 403);
        }

        if (app()->bound('sentry')) {
            $sentry = app('sentry');
            $sentry->user_context(['id' => $request->get('api-key')]);
        }

        return $next($request);
    }
}
