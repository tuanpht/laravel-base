<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Response;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /* if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return abort(Response::HTTP_UNAUTHORIZED);
            }

            return redirect('/home');
        }

        if ($user = Auth::guard($guard)->user() &&
            !$user->canAccessAdmin()) {
            return abort(Response::HTTP_UNAUTHORIZED);
        } */

        return $next($request);
    }
}
