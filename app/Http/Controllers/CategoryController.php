<?php


namespace App\Http\Controllers;



use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function getAllByCategory(Request $request)
    {
        $category = Category::where('slug', $request->category)->first();
        $articles = Article::where('category_id', $category->id)->where('img', '!=', '')->latest()->paginate(21);

        return response()->view('news.category_articles', ['articles' => $articles]);
    }
}
