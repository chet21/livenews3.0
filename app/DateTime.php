<?php

namespace App;


class DateTime
{
    static private $day = [
        'monday' => [
            'ua' => 'понеділок',
            'ru' => 'понедельник'
        ],
        'tuesday' => [
            'ua' => 'вівторок',
            'ru' => 'вторник'
            ],
        'wednesday' => [
            'ua' => 'середа',
            'ru' => 'среда'
        ],
        'thursday' => [
            'ua' => 'четвер',
            'ru' => 'четверг'
        ],
        'friday' => [
            'ua' => 'п`ятниця',
            'ru' => 'пятница'
        ],
        'saturday' => [
            'ua' => 'субота',
            'ru' => 'суббота'
        ],
        'sunday' => [
            'ua' => 'неділя',
            'ru' => 'воскресенье'
        ]
    ];
    public static function getDayTranslate(string $day = null, string $lang = null )
    {
        if(!$day){
            $day = Carbon::now();
        }
        return self::$day[$day][$lang];
    }
}
