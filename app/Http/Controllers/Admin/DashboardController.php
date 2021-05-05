<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Repository\VisitorsRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $visitors;

    public function __construct()
    {
        $this->visitors = new VisitorsRepository();
    }

    public function index()
    {
        date_default_timezone_set('Europe/Kiev');
        return view('admin.dashboard', [
            'visitors_today' => $this->visitors->today()->orderByDesc('id')->paginate(15)
        ]);
    }
}
