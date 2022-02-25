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

        if ($rubrikaname < 0 && empty($keyWords) && empty($title) && empty($author)) {
            $message = "Hech bo'lmaganda bitta maydonga ma'lumot yozing";
            
             return response()->json([
                 'status' => -1,
                 'message' => $message
             ]);
           
        }
            if (!empty($searchList)) {
                return response()->json([
                    'searchList' => $searchList,
                    'message' => count($searchList),
                    'status' => 1
                ]);
            }
            // dd($searchList);
            // dd($rubrikaname);
            // dd($keyWords);
            else {
                $message = "Siz so'ragan ma'lumot topilmadi";
                return response()->json([
                    'status' => 0,
                    'message' => $message
                ]);
            }
    }

    public function show($id) {
        
        $searchManager = new SearchManager();
        $publishedList = $searchManager->getPublished($id);
        $searchList = $searchManager->showSearch($id);
        $rubrika_id = $searchManager->getRubrikaId($id);
        $rubrikaList = $searchManager->SearchPublishForRubrika($rubrika_id);

        if (session()->has('subscriber')) {
            $user_id = session()->get('subscriber')[0]->id;
            $profileManager = new SubscriberFizikManager();
            $sfizikId = $profileManager->profileManager($user_id)[0]->id;

            $isSubscriber = $searchManager->getIsSubscriber($id, $sfizikId);
        }
        
        else {
            $isSubscriber = $searchManager->getNRegister($id);
        }
        // dd($user_id);
        
        

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
