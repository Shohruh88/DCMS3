<?php

namespace App\Http\Controllers;

use App\Manager\HomeManager;
use App\Manager\RubrikaManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{

    public function homeList() {
        // if (session()->has('user')) {
        //     $user = session()->get('user');
        // }

        // dd($user);
        $j_id = 4;
        $g_id = 1;
        $k_id = 2;
        $homeManager = new HomeManager();
        $rubrikaManager = new RubrikaManager();
        $jurnalList = $homeManager->JurnalList($j_id);
        $gazetaList = $homeManager->GazetaList($g_id);
        $kitobList = $homeManager->KitobList($k_id);
        $rubrikaList = $rubrikaManager->getAllRubrikaData();
        // dd($jurnalList, $gazetaList, $kitobList);
        return view('home', [
            'title' => 'Home Page',
            'jurnalList' => $jurnalList,
            'gazetaList' => $gazetaList,
            'kitobList' => $kitobList,
            'rubrikaList' => $rubrikaList
        ]);

        // Artisan::storage
        // dd($homeList);
    }


}
