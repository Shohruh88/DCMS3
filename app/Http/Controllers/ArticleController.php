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
        if(session()->has('article')) {
            $article = session()->get('article');
            return view('articles.createArticle', [
                'article' => $article[0]
            ]);
            // dd($article);
        } else {
            return redirect()->route('select.index');
        }
          
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
        // dd($request);
        $articleManager = new ArticleManager();
        $articleManager->insertArticleList($title, $author, $publishedname, $description, $author_count, $page_count);

        return redirect()->route('article.create');
    }


}
