<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Manager\HomeManager;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $homeManager = new  HomeManager();
        $homeList = $homeManager->getDataForHome();
        return response()->json([
            'homeList' => $homeList
        ]);
    }
}
