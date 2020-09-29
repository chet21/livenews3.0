<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function categoryList()
    {
        $categories = Category::all()->sortBy('position');

        return view('admin.category.category-list', ['categories' => $categories]);
    }

    public function createCategory(Request $request)
    {
        Validator::make($request->all(), [
            'title_ua' => 'string|min:3',
            'title_ru' => 'string|min:3'
        ])->validate();

        $data = $request->all();
        unset($data['_token']);
        $data['slug'] = Str::slug($data['title_ua'], '-');

        $category = Category::firstOrNew($data);
        if($category->exists){
            return response()->json(['status' => '200'], 200);
        }else{
            $category->save();
            return response()->json(['status' => '201', 'data' => $category->toArray()], 201);
        }
    }

    public function changeCategoryPosition(Request $request)
    {
        try {
            foreach ($request->data as $k => $item) {
                Category::where('id', $item)->update(['position' => $k+1]);
            }

            return response()->json(['status' => 200], 200);

        }catch (\Exception $exception){
            return response()->json('error', 400);
        }
    }

    public function newsTagRelation()
    {
        $categories = Category::all();
//        $tags = Tag::paginate(20);
//
//        foreach ($tags as &$tag) {
//            dump($tag->categories);
//        }
        $tags = Tag::doesntHave('categories')->where('unuse', '=', null)->paginate(20);

        return view('admin.news.relation_news_category', ['tags' => $tags, 'categorise' => $categories]);
    }

    public function saveNewsTagRelation(Request $request)
    {
        foreach ($request->data as $pair){
            DB::table('categories_tags')->insert($pair);
        }

        return response()->json(['status' => 200], 200);
    }

    public function setUnuseTag(Request $request)
    {
        $tag = Tag::find(intval($request->data['tag_id']));

        if($tag){
            $tag->unuse = 1;
            $tag->save();

            return response()->json(['status' => 200], 200);
        }else{
            throw new \Exception('Can`t set tag as unuse');
        }
    }
}
