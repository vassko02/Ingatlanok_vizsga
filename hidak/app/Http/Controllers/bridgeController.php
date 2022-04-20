<?php

namespace App\Http\Controllers;

use App\Models\bridges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class bridgeController extends Controller
{
    public function selectByField($field, $direction)
    {
        try {

            $bridges = bridges::with('location')->orderBy($field, $direction)->get();
            return response()->json($bridges);
        } catch (Exception $e) {
            return response()->json(['message' => 'Database error.'], 400);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $v = $this->fieldValidation($request);
        if ($v != '') {
            return response()->json($v, 400);
        }

        try {

            $bridge = new bridges;
            $bridge->bridgeName = $request->input('bridgeName');
            $bridge->description = $request->input('description');
            $bridge->isPublicRoad = $request->input('isPublicRoad');
            $bridge->flowKm = $request->input('flowKm');
            $bridge->routes = $request->input('routes');
            $bridge->location = $request->input('location');
            $bridge->deliveryDate = $request->input('deliveryDate');
            $bridge->pictureUrl = $request->input('pictureUrl');
            $bridge->save();
            return response()->json([
                'id' => $bridge->id
            ], 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'Database error.'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bridges  $bridges
     * @return \Illuminate\Http\Response
     */
    public function show(bridges $bridges)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bridges  $bridges
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = $this->fieldValidation($request);
        if ($v != '') {
            return response()->json($v, 400);
        }
        try {
            if (bridges::where('id', '=', $id)->exists()) {
                $bridges = bridges::find($id);
                $bridges->bridgeName = $request->input('bridgeName');
                $bridges->description = $request->input('description');
                $bridges->isPublicRoad = $request->input('isPublicRoad');
                $bridges->flowKm = $request->input('flowKm');
                $bridges->routes = $request->input('routes');
                $bridges->location = $request->input('location');
                $bridges->deliveryDate = $request->input('deliveryDate');
                $bridges->pictureUrl = $request->input('pictureUrl');
                $bridges->save(); // update
                return response()->json(['message' => 'Item was updated.'], 200);
            } else {
                return response()->json(['message' => 'Item not found.'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Database error.'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bridges  $bridges
     * @return \Illuminate\Http\Response
     */
    public function destroy(bridges $bridges)
    {
        //
    }
    public function fieldValidation(Request $request)
    {
        // https://laravel.com/docs/9.x/validation#available-validation-rules

        $validator = Validator::make(
            $request->all(),
            [
                'deliveryDate' => 'date_format:Y-m-d|before:today',
                'floxKm' => 'required|integer|between:0,2850'
            ],
            [
                'deliveryDate.before' => 'Nem lehet ma után!',
                'floxKm.between' => '0 és 2850 közti érték kell',

            ]
        );

        if ($validator->fails()) {
            return $validator->messages();
        }

        return '';
    }
}
