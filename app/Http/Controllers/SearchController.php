<?php

namespace App\Http\Controllers;

use App\Manager\PublishManager;
use App\Manager\SearchManager;
use App\Manager\SubscriberFizikManager;
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

    public function searchKey(Request $request) {
        $keyWords_1 = $request->keyWords_1;

        $searchManager = new SearchManager();
        $searchKey = $searchManager->getSearchKey($keyWords_1);
        // dd($searchKey);
        // dd($keyWords_1);
        if (!empty($searchKey)) {
            return response()->json([
                'searchKey' => $searchKey,
                'status' => 1
            ]);
        }
        
    }

    public function show($id) {
        $searchManager = new SearchManager();
        $user_id = session()->get('subscriber')[0]->id;
        $profileManager = new SubscriberFizikManager();
        $sfizikId = $profileManager->profileManager($user_id)[0]->id;
        // dd($user_id);
        $publishedList = $searchManager->getPublished($id);
        $searchList = $searchManager->showSearch($id);
        $rubrika_id = $searchManager->getRubrikaId($id);
        $rubrikaList = $searchManager->SearchPublishForRubrika($rubrika_id);
        $isSubscriber = $searchManager->getIsSubscriber($id, $sfizikId);

        // dd($publishedList, $searchList, $rubrikaList, $isSubscriber[0]);
        // if (empty($isSubscriber) || $isSubscriber == 0) {
        //     dd('Obuna bolish');
        // }
        // else {
        //     dd('Obuna qilingan');
        // }
        // dd($rubrika_id);    
        // dd($searchList);
        // dd($publishedList);  
        return view('search.showSearchResult', [
            'searchList' => $searchList,
            'publishedList' => $publishedList,
            'rubrikaList' => $rubrikaList,
            'isSubscriber' => $isSubscriber
        ]);
        
        
        // return response()->json([
        //     'searchList' => $searchList
        // ]);
    }

}
