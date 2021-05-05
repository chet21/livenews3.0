<?php

namespace App\Http\Controllers;

use App\Repository\VisitorsRepository;
use Illuminate\Http\Request;


class TestController extends Controller
{

    public function test(Request $request)
    {
        $x = new VisitorsRepository();
        dd($x->today()->paginate(10));
    }
}
