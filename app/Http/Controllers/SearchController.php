<?php

namespace App\Http\Controllers;

use App\Manager\PublishManager;
use App\Manager\PublishSubscriberManager;
use App\Manager\SearchManager;
use App\Manager\SubscriberFizikManager;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function index()
    {

        $publishManager = new PublishManager();
        $rubrikaList = $publishManager->getRubrikaList();

        return view('search.search', [
            'title' => 'Qidirish',
            'searchList' => $rubrikaList
        ]);
    }

    public function search(Request $request)
    {
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
        } else {
            $message = "Siz so'ragan ma'lumot topilmadi";
            return response()->json([
                'status' => 0,
                'message' => $message
            ]);
        }
    }

    public function show($id)
    {

        $searchManager = new SearchManager();
        $publishSubManager = new PublishSubscriberManager();
        $publishID = $searchManager->getPublishId($id);
        $typeID = $publishSubManager->getTypeId($publishID);
        $publishedList = $searchManager->getPublished($publishID, $id);


        $searchList = $searchManager->showSearch($id);
        $rubrika_id = $searchManager->getRubrikaId($publishID);
        $rubrikaList = $searchManager->SearchPublishForRubrika($rubrika_id);

        if (session()->has('user')) {
            $user_id = session()->get('user')[0]->id;
            $profileManager = new SubscriberFizikManager();
            $sfizikId = $profileManager->profileManager($user_id)[0]->id;
            $isSubscriberAll = $publishSubManager->upressSubscribersAll($typeID, $sfizikId);
            
            $isSubscriber = $searchManager->getIsSubscriber($publishID, $sfizikId);

        } else {

            $isSubscriber = $searchManager->getNRegister($publishID);
            $isSubscriberAll = [];
        }
        


        // dd($isSubscriberAll, $isSubscriber);
        return view('search.showSearchResult', [
            'title' => 'Search...',
            'searchList' => $searchList[0],
            'publishedList' => $publishedList,
            'rubrikaList' => $rubrikaList,
            'isSubscriberAll' => $isSubscriberAll,
            'isSubscriber' => $isSubscriber
        ]);
    }

    public function errorSearch(Request $request) {
        $message = $request->message;
        // dd($message);
        return redirect()->route('search')->with('error', $message);
    }
}
