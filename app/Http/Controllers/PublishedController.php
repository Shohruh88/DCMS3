<?php

namespace App\Http\Controllers;

use App\Manager\PublishedManager;
use App\Manager\PublishManager;
use Illuminate\Http\Request;

class PublishedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishedManager = new PublishedManager();
        $publishedList = $publishedManager->getPublishedList();

        return view("published.indexPublished", [
            'publishedList' => $publishedList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $publishedManager = new PublishedManager();

       $publishList = $publishedManager->getPublishList();

        return view('published.createPublished', [
            'publishList' => $publishList
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
        $date = $request->date;
        $tom = $request->tom;
        $number = $request->number;
        $image = $request->file('image');
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $request->file('image')->move('public/images/', $imageName);

        $publishedManager = new PublishedManager();
        $publishedManager->insertPublished($publishname, $date, $tom, $number, $imageName);
    
        return redirect()->route("published.create");
    }

  
}
