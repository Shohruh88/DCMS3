<?php

namespace App\Http\Controllers;

use App\Manager\HomeManager;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function homeList() {

        $homeManager = new HomeManager();
        $homeList = $homeManager->listForHome();
        return view('home', [
            'homeList' => $homeList
        ]);

        // dd($homeList);
    }

}
