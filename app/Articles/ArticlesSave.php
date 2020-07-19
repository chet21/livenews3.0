<?php


namespace App\Articles;


use App\Models\Article;
use App\Models\Tag;
use App\Parser\News\BaseNewsParser;

class ArticlesSave
{
    public static function asParser(BaseNewsParser $news)
    {
        foreach ($news->getData() as $item){
            $title_ua = array_shift($item['news']);
            $new_article = Article::firstOrCreate(['title_ua' => $title_ua],$item['news']);
            foreach ($item['tags']['ua'] as $tag1) {
//                dd([['slug' => $tag1['slug'], ['title_ua' => $tag1['title_ua']]]]);
                $tag = Tag::firstOrNew(['slug' => $tag1['slug']],['title_ua' => $tag1['title_ua']]);
                $new_article->tags()->save($tag);
            }
            if(isset($item['tags']['ru'])){
                foreach ($item['tags']['ru'] as $tag2) {
                    $tag = Tag::firstOrNew(['slug' => $tag2['slug']],['title_ru' => $tag2['title_ru']]);
                    $new_article->tags()->save($tag);
                }
            }

            $category_rate = [];
            foreach ($new_article->tags as $tag) {
                $category = $tag->categories->first();
                if(isset($category->id)){
                    if(isset($category_rate[$category->id])){
                        $category_rate[$category->id] += 1;
                    }else{
                        $category_rate[$category->id] = 1;
                    }
                }
            }
            arsort($category_rate);
            foreach ($category_rate as $k => $item){
            $new_article->update(['category_id' => $k]);
                break;
            }
        }
    }

    public static function getCategoryIdBeforeSave()
    {
//        $sN = rand(1, count($data[$k]['tags']['ua']))-1;
//        $tagN = Tag::where('title_ua', '=', $data[$k]['tags']['ua'][$sN]['title'])->first();
//        $data[$k]['news']['category_id'] = (isset($tagN->categories->id) ?: 1); // 1 - категорія інше
    }
}
