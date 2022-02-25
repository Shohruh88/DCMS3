<?php

namespace App\Http\Controllers;

use App\Manager\HomeManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{

    public function homeList() {

        $homeManager = new HomeManager();
        $homeList = $homeManager->listForHome();
        return view('home', [
            'homeList' => $homeList
        ]);

        // Artisan::storage
        // dd($homeList);
    }

    // public function searchKey(Request $request) {
    //     $keyWords_1 = $request->keyWords_1;

    //     $searchManager = new HomeManager();
    //     $searchKey = $searchManager->getSearchKey($keyWords_1);
    //     // dd($searchKey);
    //     // dd($keyWords_1);
    //     if (!empty($searchKey)) {
    //         return response()->json([
    //             'searchKey' => $searchKey,
    //             'status' => 1
    //         ]);
    //     }
        
    // }

}
