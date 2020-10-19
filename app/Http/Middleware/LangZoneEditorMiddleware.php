<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class LangZoneEditorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Cookie::has('lang')){
            App::setLocale(Cookie::get('lang'));
        }else{
            $this->getLocale($request);
            App::setLocale(\cookie()->queued('lang')->getValue());
        }

        return $next($request);
    }

    public function getLocale(Request $request) {
        $uri = \Illuminate\Support\Facades\Request::path();
        $segmentsURI = explode('/',$uri);
        switch (empty($segmentsURI[0])){
            case 'ua' :
                Cookie::queue('lang', 'ua');
            break;
            case 'ru' :
                Cookie::queue('lang', 'ru');
            break;
            default:
                Cookie::queue('lang', 'ua');
        }
    }
}
