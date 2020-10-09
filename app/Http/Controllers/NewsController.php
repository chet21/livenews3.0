<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Egulias\EmailValidator\Exception\ExpectingAT;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\DeclareDeclare;

class NewsController extends Controller
{
    public function oneArticle(Request $request)
    {
        if(preg_match('/^[0-9]+$/', $request->ident)){
           try{
               $old_article = DB::connection('old_server')->table('news')->where('id', intval($request->ident))->first();
               $category = new \stdClass();
               $category->title_ua = '1';

               $article = new \stdClass();
               $article->id = $old_article->id;
               $article->category_id = $old_article->id_category;
               $article->origin_id = $old_article->id_donor;
               $article->title_ua = $old_article->title_ua;
               $article->title_ru = $old_article->title_ru;
               $article->text_ua = $old_article->text_ua;
               $article->text_ru = $old_article->text_ru;
               $article->img = $old_article->img;
               $article->views = $old_article->view ?? 0;
               $article->active = 1;
               $article->created_at = $old_article->time;

               $article->categories = $category;
           }catch (\Exception $e){
               abort(404);
           }
        }else{
            $request = explode('_n', $request->ident);
            $article = Article::with(['tags' => function($tags){
                $tags->whereNull('unuse')->select('title_ua');
            }, 'comments', 'origin'])->where(['id' => $request[1], 'slug' => $request[0]])->first();
        }
        return view('news.one_article', ['article' => $article]);
    }

    public function setComment(Request $request)
    {
        $data = [
            'comment_status_id' => 1,
            'article_id' => (int) $request->data['article_id'],
            'user_id' => Auth::id(),
            'text' => $request->data['text'],
        ];

        $x = Comment::create($data);
        return response()->json(['message' => $x]);
    }
}
