<?php

namespace App\Http\Controllers;

use App\Manager\NewsManager;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $startDate = date('Y-m-01');
        $endDate = date('Y-m-t');
        // dd($startDate, $endDate);
        $newsManager = new NewsManager();
        $datePublishedList = $newsManager->newsManager($startDate, $endDate);
        // dd($datePublishedList);
        return view('news.news', [
            'title' => 'News',
            'datePublishedList' => $datePublishedList
        ]);
    }
}
