<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CoverageRersource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoverageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coverage = DB::select("select * from coverage");
        return response()->json([
            "coverage" => CoverageRersource::collection($coverage),
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
        $coverage = DB::insert("insert into coverage(name) values (?)", [$name]);
    
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
        $coverage = DB::select("select * from coverage where id=?", [$id]);
        return response()->json([
            'coverage' => CoverageRersource::collection($coverage),
            'message' => 'Malumot olindi...'
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
        $name = $request->name;
        $coverage = DB::update("update coverage set name='$name' where id='$id'");
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
        $coverage = DB::delete("delete from coverage where id='$id'");
        return response()->json([
            'message' => 'Malumot ochirildi...'
        ]);
    }
}
