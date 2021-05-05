<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19.07.2020
 * Time: 13:57
 */

class OriginSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        \App\Models\Origin::updateOrCreate(
            ['id' => 1],
            ['title' => 'LiveNews']);
        \App\Models\Origin::updateOrCreate(
            ['id' => 2],
            ['title' => '24tv.ua'],
            ['src' => 'https://24tv.ua/']);
    }
}