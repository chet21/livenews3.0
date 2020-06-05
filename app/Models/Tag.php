<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = [
        'slug',
        'title_ua',
        'title_ru',
    ];



    public $timestamps = false;

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_tags', 'tags_id','categories_id');
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'articles_tags', 'articles_id', 'tags_id');
    }

}
