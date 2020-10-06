<?php


namespace App\GateWays;


class Weather
{
    public static $server = 'http://ipwhois.app/json/';

    public static function info($ip)
    {
        $http = Http::get(self::$server.'/'.$ip);
        $response = json_decode($http);

        return $response;
    }
}
