<?php

namespace App\Http\Controllers;

use App\Repository\NewsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IndexController extends \App\Http\Controllers\Controller
{
    private $newsRepository;

    public function __construct()
    {
        $this->newsRepository = new NewsRepository();
    }

    public function index(Request $request)
    {
        try {
            $hotNews = Cache::get('hot_news');
            $bodyNews = Cache::get('body_news');
            $leftNews = Cache::get('left_news');

            if(!$hotNews || !$bodyNews || !$leftNews){
                throw new \Exception();
            }

        }catch (\Exception $e){
            $hotNews = $this->newsRepository->getIndexHotNews();
            $bodyNews = $this->newsRepository->getIndexBodyNews();
            $leftNews = $this->newsRepository->getIndexLeftNews();
        }

        return view('index.index', ['hotNews' => $hotNews, 'bodyNews' => $bodyNews, 'left_news' => $leftNews]);

    }
}
