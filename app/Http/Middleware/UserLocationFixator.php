<?php

namespace App\Http\Middleware;

use App\Models\Visitors;
use Carbon\Carbon;
use Closure;
use Stevebauman\Location\Facades\Location;

class UserLocationFixator
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
        $position = Location::get('46.63.112.17');

        setlocale(LC_ALL, 'ru_RU.utf8');

        if($request->ip() !== '46.63.112.17'){
            date_default_timezone_set($position->timezone);

            if($position){
                $agent = $request->userAgent();
                $bot_tags = config('location.bots');
                $isBot = false;

                foreach ($bot_tags as $tag) {
                    if(preg_match('/'.$tag.'/mi', $agent)){
                        $isBot = true;
                        break;
                    }
                }

                if(!$isBot){
                    Visitors::create([
                        'ip' => $request->ip(),
                        'city' => $position->cityName,
                        'region' => $position->regionName,
                        'country' => $position->countryName,
                        'form' => $request->headers->get('referer'),
                        'to' => $request->path(),
                    ]);
                }
            }
        }

        return $next($request);
    }
}
