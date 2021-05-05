<?php

use Illuminate\Database\Seeder;
use \App\Models\CommentStatusModel;

class CommentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CommentStatusModel::updateOrCreate([
            'id' => 1
        ],[
            'name' => 'new',
            'description' => 'Новий коментар'
        ]);
    }
}
