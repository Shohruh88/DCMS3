<?php

namespace App\Http\Controllers;

use App\Manager\ArticleManager;
use Illuminate\Http\Request;

class ArticleSelectController extends Controller
{
    public function index() {
        // $sessiya = session()->get('article');
        // dd($sessiya);
        return view('articles.createSelect');
    }

    public function publisherSelect(Request $request) {
        $publishername = $request->publishername;
        $articleManager = new ArticleManager();
        $publisherList = $articleManager->publisherSelectManager($publishername);
        // dd($publisherList);
        return response()->json([
            'publisherList' => $publisherList
        ]);
    }

    public function publishedSelect(Request $request) {
        $publisher_id = $request->publisher_id;
        $publishedname = $request->publishedname;
        $publishedListManager = new ArticleManager();
        $publishedList = $publishedListManager->publishedSelectManager($publisher_id, $publishedname);

        // dd($publishedList);
        return response()->json([
            'publishedList' => $publishedList
        ]);
    }

    public function publisherAndPublishedSelect(Request $request) {
        $published_id = $request->published_id;
        // dd($publisher_id, $published_id);
        $selectManager = new ArticleManager();
        $select = $selectManager->publisherAndPublishedManager($published_id);

        if (!empty($select)) {
            $request->session()->put('article', $select);
            return response()->json([
                'status' => 1
            ]);
        } else {
            return response()->json([
                'status' => 0
            ]);
        }

    }

    public function articleLogout() {
        session()->forget('article');
        return redirect()->route('article.index');
    }
}
