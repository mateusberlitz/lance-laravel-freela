<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckJsonIsValid {

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed {
        if ($content = $request->getContent()) {
            json_decode($content);

            if (json_last_error() != JSON_ERROR_NONE)
                return response()->json([
                    'error' => 'Bad JSON received'
                ], 400);
        }

        return $next($request);
    }

}
