<?php

namespace App\Http\Controllers;

use App\Manager\PublishManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publish = new PublishManager();

        $publishList = $publish->getPublishData();

        return view('publish.indexPublish', [
            'publishList' => $publishList
        ]);
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishManager = new PublishManager();
        $typeList = $publishManager->getTypeList();
        $rubrikaList = $publishManager->getRubrikaList();
        $publisherList = $publishManager->getPublisherList();

        return view('publish.createPublish', [
            'typeList' => $typeList,
            'rubrikaList' => $rubrikaList,
            'publisherList' => $publisherList
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
        $publishname = $request->publishname;
        $publishtype = $request->publishtype;
        $publishername = $request->publishername;
        $rubrikaname = $request->rubrikaname;

        $publish = new PublishManager();
        $publish->insertPublish($publishname, $publishtype, $rubrikaname, $publishername);

        return redirect()->route('published.create');
    }

}
