<?php

namespace App\Http\Controllers;

use App\Parser\News\NewsParser24Ua;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $x = new NewsParser24Ua(1);
        dd($x->getData());
    }
}
