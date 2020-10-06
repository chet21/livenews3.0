<?php


namespace App\Logger;


use Illuminate\Http\Request;

class UserLogger
{
    public $user_agent = "";
    public $user_location = "";
    public $user_lang = "";
    public $user_city = "";
    public $visit_from = "";
    public $visit_to = "";

    public function define_user_agent(string $user_agent)
    {
        $bot_tags = [
           'bot'
        ];
        $this->user_agent = $user_agent;
        foreach ($bot_tags as $tag) {
            if(preg_match('/'.$tag.'/gmi', $user_agent)){
                $this->user_agent = 'bot';
                break;
            }
        }
    }


    public function define_user_location(Request $request)
    {
        dd($request->header('User-Agent'));
    }
}
