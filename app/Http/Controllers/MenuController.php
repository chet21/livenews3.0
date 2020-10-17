<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getMenu()
    {
        $categories =Category::whereHas('articles', function ($query) {
            $query->where('img', '!=', '');
        }, '>', 8)->get()->sortBy('position');

        return response()->json(['data' => $categories]);
    }
}
