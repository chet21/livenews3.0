<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangZoneEditorMiddleware
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
        $locale = $this->getLocale();
//        dd($locale);
        App::setLocale($locale);
//        dd($request);
        return $next($request);
    }

    public function getLocale() {
        $uri = \Illuminate\Support\Facades\Request::path();
        $segmentsURI = explode('/',$uri);
        if (empty($segmentsURI[0]) && !session('lang')) {
            return 'ua';
        }elseif (empty($segmentsURI[0]) && session('lang')){
            return session('lang');
        }
    }

}
