<?php

namespace App\Http\Middleware;

use Closure;

class BasicAuthMiddleware
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
        $username = $request->getUser();
        $password = $request->getPassword();

        if ($username === env('BASIC_USERNAME', '') && $password === env('BASIC_PASSWORD', '')) {
            return $next($request);
        }

        abort(401, "Enter username and password.", [
            header('WWW-Authenticate: Basic realm="TimesavingsBank"'),
            header('Content-Type: text/plain; charset=utf-8')
        ]);
        
        return $next($request);
    }
}
