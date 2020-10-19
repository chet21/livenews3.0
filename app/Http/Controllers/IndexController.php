<?php

namespace App\Http\Controllers;

use App\Articles\ArticlesSave;
use App\Models\Article;
use App\Models\Category;
use App\Parser\News\NewsParser24Ua;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;

class IndexController extends \App\Http\Controllers\Controller
{
    public function index(Request $request)
    {
        $notIncludeMore = [];
        $hotNews = Article::select('*', 'title_'.App::getLocale().' as title')->with(['categories' => function($categories){
            $categories->select('*', 'title_'.App::getLocale().' as title');
        }])->where('img', '!=', '')->where('title_'.App::getLocale(), '!=', '')->limit(6)->orderBy('id', 'desc')->get();
//        Cache::put('hot_news', $hotNews);
//        $hotNews = Cache::get('hot_news');
        foreach ($hotNews as $hotNew) {
            $notIncludeMore[] = $hotNew->id;
        }


        $categories = Category::select('*', 'title_'.App::getLocale().' as title')->whereHas('articles', function ($query) {
            $query->where('img', '!=', '');
        }, '>', 8)->get()->sortBy('position');
        $bodyNews = [];

        foreach ($categories as $category) {
            $bodyNews[$category->slug] = $category->articles()
                ->select('*', 'title_'.App::getLocale().' as title', 'text_'.App::getLocale().' as text')
                ->where('title_'.App::getLocale(), '!=', '')
                ->where('img', '!=', '')
                ->whereNotIn('id', $notIncludeMore)
                ->limit(8)
                ->orderBy('id', 'desc')
                ->get();
        }

        foreach ($bodyNews as &$item) {
            foreach ($item as &$i){
                preg_match( "#([^\.\!\?]*[\.\!\?])|(.*)#si" , $i->text , $r );
                $i->description = $r[0];
            }
        }

        //        Cache::put('body_news', $bodyNews);
//        $bodyNews =рг Cache::get('body_news');

        $count_left_blocks = $categories->count() * 12;
        $left_news = Article::select('*', 'title_'.App::getLocale().' as title')->where('img', '=', '')->limit($count_left_blocks)->get()->sortBy('created_at');
//dump($count_left_blocks);
//dump(count($left_news));
        return view('index.index', ['hotNews' => $hotNews, 'bodyNews' => $bodyNews, 'left_news' => $left_news]);
    }
}
