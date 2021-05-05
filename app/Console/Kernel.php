<?php

namespace App\Console;

use App\Articles\ArticlesSave;
use App\Parser\news\NewsParser24Ua;
use App\Repository\NewsRepository;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Cache;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->call(function (){
             $news = new NewsParser24Ua(4);
             ArticlesSave::asParser($news->getData());

             $news = new NewsRepository();

             Cache::put('hot_news', $news->getIndexHotNews());
             Cache::put('body_news', $news->getIndexBodyNews());
             Cache::put('left_news', $news->getIndexLeftNews());

         })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
