<?php

namespace App\Http\Controllers;

use App\Models\Ingatlanok;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class IngatlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {try{
        $ingatlanok=Ingatlanok::with('kategoria')->get();
        return response()->json($ingatlanok);
    }
    catch(Exception $e){
        return response()->json([
            "message"=>"Database error",
            "error"=>$e
        ],400);
    }
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
        if(!$this->fieldValidator($request)){
            return response()->json([
                "message"=>"Hiányos adatok!"
            ]);
        }
        $ingatlan=new Ingatlanok;
        $ingatlan->kategoria=$request->input('kategoria');
        $ingatlan->szoveg=$request->input('szoveg');
        $ingatlan->hirdetesDatuma=$request->input('hirdetesDatuma');
        $ingatlan->tehermentes=$request->input('tehermentes');
        $ingatlan->ar=$request->input('ar');
        $ingatlan->kepUrl=$request->input('kepUrl');
        $ingatlan->save();
        return response()->json([
            'id'=>$ingatlan->id
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingatlan  $ingatlan
     * @return \Illuminate\Http\Response
     */
    public function show(Ingatlanok $ingatlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingatlan  $ingatlan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingatlanok $ingatlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingatlan  $ingatlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingatlanok $ingatlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingatlan  $ingatlan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Ingatlanok::where('id','=',$id)->exists()){
            $ingatlan=Ingatlanok::find($id);
            $ingatlan->delete();
            return response()->json([
                "message"=>"Ingatlan törölve"
            ],204);
        }
        else{
            return response()->json([
                "message"=>"Nem létezik"
            ],404);
        }
    }
    public function fieldValidator(Request $request){
        $validator=Validator::make(
            $request->all(),
            [
                'kategoria'=>'required',
                'tehermentes'=>'required',
                'ar'=>'required'
            ]
            );
            if($validator->fails()){
                return false;
            }
            return true;
    }
}
