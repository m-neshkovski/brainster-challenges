<?php

namespace App\Http\Controllers;

use App\Models\Player_team;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('team.index', ['teams' => Team::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
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
            'name' => 'required|string|max:255',
            'year_founded' => 'required',
        ]);

        $team = Team::make();
        $team->user_id = Auth::user()->id;
        $team->name = $request->name;
        $team->year_founded = $request->year_founded;
        $team->save();

        return redirect()->back()->with('status', 'Team successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('team.show', ['team' => Team::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('team.edit', ['team' => Team::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year_founded' => 'required',
        ]);

        $team = Team::find($id);
        $team->user_id = Auth::user()->id;
        $team->name = $request->name;
        $team->year_founded = $request->year_founded;
        $team->save();

        return redirect()->back()->with('status', 'Team successfully added.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Player_team::where('team_id', $id)->delete();
        Team::find($id)->delete();

        return redirect()->back()->with('status', 'Team was deleted');
    }
}
