<?php

namespace App\Http\Middleware;

use Closure;

class Visitor
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
        if($request->input('test')){
            dump(request()->headers->get('referer'));
            dump($request->server('HTTP_USER_AGENT'));
            dump($request->server('HTTP_REFERER'));
        }
        return $next($request);
    }
}
