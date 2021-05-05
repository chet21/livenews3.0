<?php


namespace App\Repository;


use Carbon\Carbon;

class BaseRepository
{
    protected $model;

    private function model()
    {
        return new $this->model;
    }

    public function all()
    {
        return $this->model()->all();
    }

    public function today()
    {
        return $this->model()->whereBetween('created_at', [Carbon::today(), Carbon::today()->addDay()->subSecond()]);
    }

    public function yesterday()
    {
        return $this->model()->whereBetween('created_at', [Carbon::today()->subDay(), Carbon::today()->subDay()->addDay()->subSecond()]);
    }

    public function byDate($date)
    {
        return $this->model()->where('created_at', $date);
    }


//    public function sortBy($by = 'id')
//    {
//        return $this->sortBy($by);
//    }

//    public function sortDesc($by = 'id')
//    {
//        return $this->all()->sortByDesc($by);
//    }
//
//    public function first()
//    {
//        return $this->first();
//    }
}