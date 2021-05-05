<?php


namespace App\GateWays;


use Illuminate\Support\Facades\Http;

class IpWhoIs
{
    public static $server = 'http://ipwhois.app/json/';

    public static function info($ip)
    {
        $http = Http::get(self::$server.'/'.$ip);
        $response = json_decode($http);

        return $response;
    }
}
