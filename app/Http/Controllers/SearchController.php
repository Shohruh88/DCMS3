<?php

namespace App\Http\Controllers;

use App\Manager\PublishManager;
use App\Manager\SearchManager;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function index() {   

    //    $searchManager = new SearchManager();
       $publishManager = new PublishManager();
       $rubrikaList = $publishManager->getRubrikaList();
        
            return view('search.search', [
                'searchList' => $rubrikaList
            ]);
        
    }

    public function search(Request $request) {
        $author = $request->author;
        $title = $request->title;
        $rubrikaname = $request->rubrikaname;
        $keyWords = $request->keyWords;

        $searchManager = new SearchManager();

        
        $searchList = $searchManager->getSearchSqlQuery($author, $title, $rubrikaname, $keyWords);
        // dd($searchList);
        if (empty($searchList)) {
            return response()->json([
                'searchList' => $searchList,
                'message' => 'Bu yerda siz qidirgan malumot topilmadi...'
            ]);
        }

        return response()->json([
            'searchList' => $searchList,
            'message' => count($searchList)
        ]);

    }

    public function show($id) {
        $searchManager = new SearchManager();
        $publishedList = $searchManager->getPublished($id);
        $searchList = $searchManager->showSearch($id);
        $rubrika_id = $searchManager->getRubrikaData($id);
        $rubrikaList = $searchManager->rubrikaList($rubrika_id);
        // dd($publishedList, $searchList, $rubrikaList);

        // dd($publishedList);
        return view('search.showSearchResult', [
            'searchList' => $searchList,
            'publishedList' => $publishedList,
            'rubrikaList' => $rubrikaList
        ]);
        
        
        // return response()->json([
        //     'searchList' => $searchList
        // ]);
    }

}