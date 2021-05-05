<?php

namespace App\Parser;

use Illuminate\Support\Facades\Http;
use Lib\Parser\ProxyParser;

abstract class BaseParser
{
    private $proxy = null;

    private function request(string $url)
    {
        $request = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 YaBrowser/17.3.1.840 Yowser/2.5 Safari/537.36',
            'Referer' => 'http://www.google.com'
        ]);
        if($this->proxy){
            $request->withOptions([
                'proxy_host' => $this->proxy->host,
                'proxy_port' => $this->proxy->port
            ]);
        }
        return $request->get($url);
    }

    protected function setProxy(ProxyParser $proxy)
    {
        $this->proxy = $proxy;
        return $this;
    }

    protected function getHtml($url)
    {
        return $this->request($url)->body();
    }


}
