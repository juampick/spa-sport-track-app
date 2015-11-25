<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Track;
use App\User;
use Validator;

class TracksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(1); //Harcoded for now -> after implemented Authentication this line could be replaced with: Auth::user();
        $tracks = $user->tracks;        

        return $tracks;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'distance' => 'required|numeric',
            'time' => 'required',
            'type_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'invalid_data'], 422);
        }

        $user_id = 1; //Harcoded for now -> after implemented Authentication could be Auth::user()->id;

        $data = $request->all();
        $data['user_id'] = $user_id;

        return Track::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Track::find($id);
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
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'distance' => 'required|numeric',
            'time' => 'required',
            'type_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'invalid_data'], 422);
        }

        $track = Track::find($id);
        $track->date = $request->input('date');
        $track->distance = $request->input('distance');
        $track->time = $request->input('time');
        $track->type_id = $request->input('type_id');
        $track->save();

        return $track;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Track::destroy($id);
    }
}
