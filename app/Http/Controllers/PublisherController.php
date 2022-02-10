<?php

namespace App\Http\Controllers;

use App\Manager\PublisherManager;
use App\Manager\PublishManager;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index()
    {
        $publishManager = new PublishManager();

        $publisherList = $publishManager->getPublisherList();

        return view("publisher.indexPublisher", [
            'publisherList' => $publisherList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("publisher.createPublisher");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publishername = $request->publishername;
        $leader_name = $request->leader_name;
        $address = $request->address;
        $tel_number = $request->tel_number;
        $email = $request->email;

        $publisherManager = new PublisherManager();
        $publisherManager->insertPublisher($publishername, $leader_name, $address, $tel_number, $email);

        return redirect()->route('publisher.index');
    }

 
}
