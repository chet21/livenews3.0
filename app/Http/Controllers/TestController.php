<?php

namespace App\Http\Controllers;

use App\Logger\UserLogger;
use App\Parser\News\NewsParser24Ua;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Articles\ArticlesSave;

class TestController extends Controller
{
    public function test(Request $request)
    {
        UserLogger::add($request);
//        ArticlesSave::asParser(new NewsParser24Ua(1));
    }
}
