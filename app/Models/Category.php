<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'title_ua', 'title_ru', 'slug', 'color'
    ];

    public $timestamps = false;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'categories_tags', 'categories_id', 'tags_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }

}
