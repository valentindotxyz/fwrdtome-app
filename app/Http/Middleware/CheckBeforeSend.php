<?php

namespace App\Http\Middleware;

use App\ApiKey;
use App\Enums\ClientSources;
use Closure;

class CheckBeforeSend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->has(['api-key', 'link'])) {
            return response()->json("Missing data", 401);
        }

        if (!ApiKey::isValid($request->get('api-key'))) {
            return response()->json("Invalid API key", 403);
        }

        $apiKey = ApiKey::where('uuid', $request->get('api-key'))->first();

        if (!in_array($apiKey->source, ClientSources::getAll())) {
            return response()->json("Invalid source", 403);
        }

        return $next($request);
    }
}
