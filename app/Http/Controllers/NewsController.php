<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\DeclareDeclare;

class NewsController extends Controller
{
    public function oneArticle(Request $request)
    {
        $request = explode('_n', $request->ident);
        $article = Article::with(['tags', 'comments'])->where(['id' => $request[1], 'slug' => $request[0]])->first();

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
