<?php

namespace App\Http\Controllers;

use App\Models\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('match.index', ['matches' => Match::all()]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(SMatch $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(SMatch $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SMatch $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(SMatch $match)
    {
        //
    }
}
