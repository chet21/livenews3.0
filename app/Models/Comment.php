<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'comment_status_id', 'article_id', 'user_id', 'text'
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
