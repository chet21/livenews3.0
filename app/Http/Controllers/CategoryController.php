<?php


namespace App\Http\Controllers;



use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function getAllByCategory(Request $request)
    {
        $category = Category::where('slug', $request->category)->first();
        $articles = $category->articles()->where('img', '!=', '')->get()->sortByDesc('id');

        return response()->view('news.category_articles', ['articles' => $articles]);
    }
}
