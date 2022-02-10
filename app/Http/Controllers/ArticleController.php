<?php

namespace App\Http\Controllers;

use App\Manager\ArticleManager;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleManager = new ArticleManager();
        $articleList = $articleManager->getArticleList();
        
        return view('articles.indexArticle', [
            'articleList' => $articleList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articleManager = new ArticleManager();
        $publishedPublish = $articleManager->createArticleView();

        return view('articles.createArticle', [
            'publishedList' => $publishedPublish
        ]);

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $author = $request->author;
        $publishedname = $request->publishedname;
        $description = $request->description;
        $author_count = $request->author_count;
        $page_count = $request->page_count;

        $articleManager = new ArticleManager();
        $articleManager->insertArticleList($title, $author, $publishedname, $description, $author_count, $page_count);

        return redirect()->route('article.create');
    }


}
