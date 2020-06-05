<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28.03.2018
 * Time: 12:38
 */

namespace Lib\Parser\News;


class NewsParser112 extends BaseNewsParser implements InterfaceNewsParser
{
    protected $url = 'https://112.ua';
    protected $id_donor = 3;


    public function __construct($count)
    {
        parent::__construct($this->url, $count);

        $this->link_list = $this->get_link_list();
        $this->parse_link_get_data();
    }

    private function get_link_list()
    {
        $link_list = [];
        $array = $this->html->find('ul.tabs-news-list li');

        $count = ($this->count != null) ? $this->count : count($array);


        foreach ($array as $k => $article) {
            if($k <= $count - 1){
                $link_list[] = pq($article)->find('a')->attr('href');
            }
        }

        return $link_list;
    }

    public function parse_link_get_data()
    {
        $array_news = [];

        $title_for_check = [];
        $res = [];
        foreach ($this->link_list as $k => $item) {

            $x = file_get_contents($item);

            file_put_contents('test.html', $x);
            $curl = self::curl($item);
            $html = \phpQuery::newDocument($curl);

            $res['data']['id_donor'] = $this->id_donor;

            $title = $html->find('article.article-content.page-cont');
            $title = pq($title)->find('.h1')->text();
            $res['data']['title_ru'] = $this->clean_text($title);
//            $this->titles[$k] = pq($title)->find('.h1')->text();
//
//            $img = ($html->find('div.article-img')) ?: '';
//            $res['data']['img'] = pq($img)->find('img')->attr('src');

            var_dump($x);





//            $curl = self::curl($item);
//            $html = \phpQuery::newDocument($curl);
//            $title = $html->find('.b-news-full');
//            $res['title'] = pq($title)->find('h1')->text();
//            $title_for_check[$k] = pq($title)->find('h1')->text();
//            $img = $html->find('.b-news-full');
//            $res['img'] = $this->url.pq($img)->find('.b-news-full-img img')->attr('src');
//            $text = $html->find('.b-news-holder');
//            $res['text'] = pq($text)->find('.b-news-text')->text();
//            $tag = $html->find('.b-news-full');
//            $string = trim(trim(pq($tag)->find('.b-news-tags')->text(), 'Теги:'), ' ');
//            $res['tag'] = explode(", ", $string);
//            $array_news[$k]['ua'] = $res;
        }
//        foreach ($this->link_list as $k => $item){
//            $item = preg_replace('/uk/', 'ru', $item);
//            $curl = self::curl($item);
//            $html = \phpQuery::newDocument($curl);
//            $title = $html->find('.b-news-full');
//            $res['title'] = pq($title)->find('h1')->text();
//            $img = $html->find('.b-news-full');
//            $res['img'] = $this->url.pq($img)->find('.b-news-full-img img')->attr('src');
//            $text = $html->find('.b-news-holder');
//            $res['text'] = pq($text)->find('.b-news-text')->text();
//            $tag = $html->find('.b-news-full');
//            $string = trim(trim(pq($tag)->find('.b-news-tags')->text(), 'Теги:'), ' ');
//            $res['tag'] = explode(", ", $string);
//            $array_news[$k]['ru'] = $res;
//        }

//        $this->titles = $title_for_check;
//        $this->data = $array_news;
    }
}