<?php

namespace App\Http\Controllers;




use App\Articles\ArticlesSave;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Parser\News\NewsParser24Ua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $notIncludeMore = [];
        $hotNews = Article::where('img', '!=', '')->limit(7)->orderBy('id', 'desc')->get();
//        Cache::put('hot_news', $hotNews);
//        $hotNews = Cache::get('hot_news');
        foreach ($hotNews as $hotNew) {
            $notIncludeMore[] = $hotNew->id;
        }


        $categories = Category::has('articles')->get();
        $bodyNews = [];
        foreach ($categories as $category) {
            $bodyNews[$category->slug] = $category->articles()->where('img', '!=', '')->whereNotIn('id', $notIncludeMore)->limit(8)->orderBy('id', 'desc')->get();
        }

        foreach ($bodyNews as &$item) {
            foreach ($item as &$i){
                preg_match( "#([^\.\!\?]*[\.\!\?])|(.*)#si" , $i->text_ua , $r );
                $i->description = $r[0];
            }
        }
//        Cache::put('body_news', $bodyNews);
//        $bodyNews =рг Cache::get('body_news');
        return view('index.index', ['hotNews' => $hotNews, 'bodyNews' => $bodyNews]);
    }
}
