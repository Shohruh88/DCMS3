<?php

namespace App\Http\Controllers;

use App\Manager\RubrikaManager;
use Illuminate\Http\Request;

class RubrikaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubrikaManager = new RubrikaManager();
        $rubrikaList = $rubrikaManager->getAllRubrikaData();

        return view('rubrika.indexRubrika', [
            'rubrikaList' => $rubrikaList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rubrika.createRubrika');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rubrikaname = $request->rubrikaname;
        $rubrikaManager = new RubrikaManager();
        $rubrikaList = $rubrikaManager->addRubrikaData($rubrikaname);

        if ($rubrikaList) {
            return redirect()->route('rubrika.index');
        }

        else {
            return redirect()->route('rubrika.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
