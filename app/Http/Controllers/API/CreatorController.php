<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CreatorResource;
use App\Models\Creator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creators = DB::select('select * from creators');
        return response([ 'creators' => CreatorResource::collection($creators), 'message' => 'Malumot keldi'], 200);
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
        
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $description = $request->description;

        $creators = DB::insert("insert into creators(firstname, lastname, description) values(?, ?, ?)", [$firstname, $lastname, $description]);
    
        return response([
            'message' => 'Malumot saqlandi...'
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
        // $data = Creator::findOrFail($id);
        $data = DB::select("select * from creators where id=?", [$id]);
        // dd($data);
        return response([
            'creators' => CreatorResource::collection($data),
            'message' => '1 ta malumot olindi'
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
        // $data = Creator::findOrFail($id);
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $description = $request->description;
        $creator = DB::update("update creators set firstname = '$firstname', lastname = '$lastname', description = '$description' where id='$id'"); 
        return response([
            'message' => 'Malumot yangilandi!!!'
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
        DB::delete("delete from creators where id=?", [$id]);
        return response()->json([
            'message' => 'Malumot ochirildi'
        ]);
    }
}
