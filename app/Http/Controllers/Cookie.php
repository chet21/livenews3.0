<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cookie extends Controller
{
    public function setLang(Request $request)
    {
        \Illuminate\Support\Facades\Cookie::queue('lang', $request->post('lang'));
    }
}
