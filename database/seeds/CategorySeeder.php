<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19.07.2020
 * Time: 13:36
 */

class CategorySeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        \App\Models\Category::updateOrCreate(
            ['id' => 1],
            [
                'slug' => 'tsikave',
                'title_ua' => 'Цікаве',
                'title_ru' => 'Интересное',
                'position' => 1,
                'color' => 'red'
            ]);
    }
}