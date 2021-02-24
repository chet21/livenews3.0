<?php

namespace App\Parser\news;


use App\Models\Tag;
use Illuminate\Support\Str;

class NewsParser24Ua extends BaseNewsParser
{
    private $url = 'https://24tv.ua/';
    private $id_donor = 2;

    public function __construct($count)
   {
       parent::__construct($this->url, $count);
   }

    private function get_link_list()
    {
        $link_list = [];

        $links = $this->html->find('.news-list li');
        $count = ($this->count) ?: count($links);

        foreach ($links as $k => $link) {
            if($k <= $count - 1){
                $link = pq($link);
                $link = $link->find('a')->attr('href');
                if($link){
                    $link_list[] = $link;
                }
            }
        }

        return $link_list;
    }

    private function parse_link_get_data()
    {
        $data = [];

        foreach ($this->get_link_list() as $k => $item) {

            $curl = $this->getHtml($item);
            $html = \phpQuery::newDocument($curl);
            $html->find('.recomendation_list')->remove();

            $title = $html->find('.article');
            $title = pq($title)->find('.article_title')->text();

//            if(!$title){
//                break;
//            }

            $data[$k]['news']['title_ua'] = $this->clean_text($title);

//            $this->titles[$k] = pq($title)->find('.article_title')->text();

            $img = ($html->find('.top-media-content .photo_wrap .b_photo img')[0])
                ??
                ($html->find('.top-media-content .photo_wrap .b_photo amp-img')[0])
                ??
                ''
            ;
            $data[$k]['news']['img'] = pq($img)->attr('src');

            $text = $html->find('.article_text');
            $text->find('.cke-markup')->remove();
            $text->find('.adv-news-within')->remove();
            $text->find('.read-also')->remove();
            $text->find('img')->attr('style','width: 100%');
//            $img_w = $text->find('p > img')->attr('width');
//            $text->find('p > img')->wrap('<div style="'.round($img_w/2).'">');
            $text = pq($text)->find('#newsSummary')->html();

            $data[$k]['news']['text_ua'] = $this->change_data_src_data($this->clean_text($text));

            $data[$k]['news']['views'] = $this->random_views();

            $tags = $html->find('.tags a');

            foreach ($tags as $kk => $vv){
                $tag_title = pq($vv)->text();
//                $tag_id = $this->createTag(['slug' => $tag_title, 'title_ua' => $tag_title, 'title_ru' => $tag_title]);
//                $data[$k]['tags']['ua'][$kk]['id'] = $tag_id;
                $data[$k]['tags']['ua'][$kk] = ['slug' => Str::slug($tag_title), 'title_ua' => $tag_title];
            }



            //////////////////get ru content///////////////////////////////////////////////

            $ru_link = $html->find('.changeLangRU')->attr('href');

            $curl_ru = $this->getHtml($ru_link);
            $html_ru = \phpQuery::newDocumentHTML($curl_ru);

            $title_ru = $html_ru->find('.article');
            $data[$k]['news']['title_ru'] = $this->clean_text(pq($title_ru)->find('.article_title')->text());

            $text_ru = $title_ru->find('.article_text');
            $text_ru->find('.cke-markup')->remove();
            $text_ru->find('.adv-news-within')->remove();
            $text_ru->find('.read-also')->remove();
            $data[$k]['news']['text_ru'] = $this->change_data_src_data($this->clean_text(pq($text_ru)->find('#newsSummary')->html()));

            $tag_ru = $html_ru->find('.tags a');

            foreach ($tag_ru as $ku => $vvv){
                $tag_title = pq($vvv)->text();
                $data[$k]['tags']['ru'][$ku] = ['slug' => Str::slug($tag_title), 'title_ru' => $tag_title];
            }

            $data[$k]['news']['slug'] = Str::slug($title);
            $data[$k]['news']['active'] = 0;
            $data[$k]['news']['category_id'] = 1;
            $data[$k]['news']['origin_id'] = $this->id_donor;


        }

        return $data;
    }

    public function getData()
    {
        $data = $this->parse_link_get_data();

        return $data;
    }
}
