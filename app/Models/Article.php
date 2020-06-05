<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = [
        'origin_id',
        'category_id',
        'slug',
        'title_ua',
        'title_ru',
        'text_ua',
        'text_ru',
        'img',
        'views'

    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'articles_tags', 'articles_id', 'tags_id');
    }

    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
