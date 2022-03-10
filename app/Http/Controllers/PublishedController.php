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

        if (session()->has('admin')) {
            return view("published.indexPublished", [
                'publishedList' => $publishedList
            ]);
        } else {
            return redirect()->route('admin.login');
        }
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
        $file = $request->file('file');
        $isPublished = 1;
        $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
        $request->file('image')->move('public/images/', $imageName);
        $request->file('file')->move('public/file/', $fileName);

        $publishedManager = new PublishedManager();
        $publishedManager->insertPublished($publishname, $date, $tom, $number, $imageName, $fileName, $isPublished);

        return redirect()->route("published.create");
    }

    public function show($id)
    {

        $showManager = new PublishedManager();
        $showPublished = $showManager->showManager($id);
        // dd($showPublished);
        return view('published.showPublished', [
            'publishedList' => $showPublished
        ]);
    }

    public function edit($id)
    {
        return view('published.editPublished');
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        $isPublished = 0;
        $destroyManager = new PublishedManager();
        $destroyPublished = $destroyManager->destroyManager($id, $isPublished);

        // dd($destroyPublished);
        if ($destroyPublished) {
            return redirect()->route('published.index');
        }
    }

    public function history()
    {
        $isPublished = 0;
        $history = new PublishedManager();
        $historyList = $history->historyManager($isPublished);
        return view('published.historyPublished', [
            'historyList' => $historyList
        ]);
    }

    public function historyUpdate($id)
    {
        $isPublished = 1;
        $historyUpdate = new PublishedManager();
        $history = $historyUpdate->historyUpdateManager($isPublished, $id);

        if ($history) {
            return redirect()->route('history');
        }
    }
}
