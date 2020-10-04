<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 27.03.2018
 * Time: 15:56
 */

namespace App\Parser\News;

use App\Models\Tag;
use App\Parser\BaseParser;

abstract class BaseNewsParser extends BaseParser
{
    protected $curl;
    protected $html;
    protected $count;


    public function __construct($url, $count)
    {
        $this->count = $count;
        $this->curl = $this->getHtml($url);
        $this->html = \phpQuery::newDocument($this->curl);
    }

    public function getCategoryId($tagId)
    {
        $category_id = Tag::find($tagId);
        dd($category_id->tags);
    }

    protected function createTag($tag, $ln = null)
    {
        $tag = Tag::firstOrCreate($tag);
        return $tag->id;
    }

    protected function clean_text($text)
    {
        $text = trim(preg_replace('/\'/', '`', $text));
        $text = preg_replace('/  /', '', $text);
        $text = preg_replace('/<p>/', '', $text);
        $text = preg_replace('/<\/p>/', '', $text);
        $text = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/', '', $text);

        return $text;
    }

    protected function random_views()
    {
        return rand(1, 600);
    }

    public function change_data_src_data($text)
    {
        $text = preg_replace('/data-src/', 'src', $text);
        return $text;
    }
}
