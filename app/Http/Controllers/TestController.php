<?php

namespace App\Http\Controllers;

use App\Parser\News\NewsParser24Ua;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Articles\ArticlesSave;

class TestController extends Controller
{
    public function test()
    {
        ArticlesSave::asParser(new NewsParser24Ua(1));
    }
}
