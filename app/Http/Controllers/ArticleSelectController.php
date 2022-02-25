<?php

namespace App\Http\Controllers;

use App\Manager\ArticleManager;
use Illuminate\Http\Request;

class ArticleSelectController extends Controller
{
    public function index() {
        return view('articles.createSelect');
    }

    public function articleSelect(Request $request) {
        $publishername = $request->publishername;
        $articleManager = new ArticleManager();
        $publishList = $articleManager->articleSelectManager($publishername);

        return response()->json([
            'publishList' => $publishList
        ]);
    }
}
