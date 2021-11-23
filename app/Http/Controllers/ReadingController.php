<?php

namespace App\Http\Controllers;

use App\Models\Reading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Reading::find();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'device_id' => 'required',
            'data' => 'required'
        ]);
        return Reading::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Reading::find($id);
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
        $reading = Reading::find($id);
        $reading->update($request->all());
        return $reading;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Reading::destroy($id);
    }

    /**
     * Search for Reading by datetime TODO
     *
     * @param  str $name
     * @return \Illuminate\Http\Response
     */
    // public function search($name)
    // {
    //     return Reading::where('name', 'like', '%'.$name.'%')->get();
    // }
}
