<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContributorResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contributor = DB::select("select * from contributor");
        return response()->json([
            "contributor" => ContributorResource::collection($contributor),
            "message" => "Hamma malumot keldi"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $contributor = DB::insert("insert into contributor(name) values (?)", [$name]);
    
        return response([
            'message' => 'Malumot Saqlandi...'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contributor = DB::select("select * from contributor where id=?", [$id]);
        return response([
            'contributor' => ContributorResource::collection($contributor),
            'message' => 'Malumot olindi'
        ]);
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
        $name = $request->name;
        $contributor = DB::update("update contributor set name='$name' where id=$id");
        return response()->json([
            'message' => 'Malumot yangilandi...'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contributor = DB::delete("delete from contributor where id=?", [$id]);
        return response()->json([
            'message' => 'Malumot ochirildi...'
        ]);
    }
}
