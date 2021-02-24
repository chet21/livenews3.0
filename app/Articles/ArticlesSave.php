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
	//dump($item);
            $title_ua = array_shift($item['news']);
            $new_article = Article::firstOrCreate(['title_ua' => $title_ua],$item['news']);
//TODO: створюються лищні звязки тегів до новини
//dump($new_article);
            //if(!$new_article->exists){
	      foreach ($item['tags']['ua'] as $tag1) {
                if(!empty( $tag1['title_ua'] )){
                    $tag = Tag::firstOrNew(['slug' => $tag1['slug']],['title_ua' => $tag1['title_ua']]);
                    $new_article->tags()->save($tag);
                }
              }    
  	    //}
//TODO: потрібно переробити шоб теги додавалися разом з російськими
           // if(isset($item['tags']['ru'])){
             //   foreach ($item['tags']['ru'] as $tag2) {
               //     $tag = Tag::firstOrNew(['slug' => $tag2['slug']],['title_ru' => $tag2['title_ru']]);
                 //   $new_article->tags()->save($tag);
                //}
            //}
            $category_rate = [];
            foreach ($new_article->tags()->where('unuse', '=', null)->get() as $tag) {
                $category = $tag->categories->first();
                if(isset($category->id)){
                    if(isset($category_rate[$category->id])){
                        $category_rate[$category->id] += 1;
                    }else{
                        $category_rate[$category->id] = 1;
                    }
                }
            }
	    if(count($category_rate) >= 1){
	      arsort($category_rate);
	      $flag = 0;
	      foreach ($category_rate as $k => $item){
               if($flag < 1){
	         $new_article->category_id = $k;
		 $new_article->save();
		 $flag++;	
               }  
              }
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
