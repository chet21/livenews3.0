<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Article extends Model
{
    protected $table = 'articles';
    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'articles_tags', 'articles_id', 'tags_id');
    }

    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')->select('*', 'title_'.App::getLocale().' as title');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function origin()
    {
        return $this->hasOne(Origin::class, 'id', 'origin_id');
    }

}
