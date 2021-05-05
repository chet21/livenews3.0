<?php


namespace App\Repository;


use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\App;

class NewsRepository extends BaseRepository
{
    public function getIndexHotNews($notIncludeMoreGet = false)
    {
        $notIncludeMore = [];
        $hotNews = Article::select('*', 'title_'.App::getLocale().' as title')->with(['categories' => function($categories){
            $categories->select('*', 'title_'.App::getLocale().' as title');
        }])->where('img', '!=', '')->where('title_'.App::getLocale(), '!=', '')->limit(6)->orderBy('id', 'desc')->get();

        foreach ($hotNews as $hotNew) {
            $notIncludeMore[] = $hotNew->id;
        }

        if($notIncludeMoreGet){
            return $notIncludeMore;
        }else{
            return $hotNews;
        }
    }

    public function getIndexBodyNews()
    {
        $notIncludeMore = $this->getIndexHotNews(true);
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

        return $bodyNews;
    }

    public function getIndexLeftNews()
    {
        $categories = Category::select('*', 'title_'.App::getLocale().' as title')->whereHas('articles', function ($query) {
            $query->where('img', '!=', '');
        }, '>', 8)->get()->sortBy('position');
        $count_left_blocks = $categories->count() * 12;
        $left_news = Article::select('*', 'title_'.App::getLocale().' as title')->where('img', '=', '')->limit($count_left_blocks)->get()->sortBy('created_at');

        return $left_news;
    }
}