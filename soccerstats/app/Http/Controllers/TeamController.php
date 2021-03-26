<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Player_team;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index()
    {
        return view('team.index', ['teams' => Team::paginate(10)]);
    }

    public function create()
    {
        return view('team.create');
    }

    public function store(TeamRequest $request)
    {
        $team = Team::make();
        $team->user_id = Auth::user()->id;
        $team->name = $request->name;
        $team->year_founded = $request->year_founded;
        $team->save();
        return redirect()->back()->with('status', 'Team successfully added.');
    }

    public function show($id)
    {
        return view('team.show', ['team' => Team::find($id)]);
    }

    public function edit($id)
    {
        return view('team.edit', ['team' => Team::find($id)]);
    }

    public function update(TeamRequest $request, $id)
    {
        $team = Team::find($id);
        $team->user_id = Auth::user()->id;
        $team->name = $request->name;
        $team->year_founded = $request->year_founded;
        $team->save();
        return redirect()->back()->with('status', 'Team successfully added.');
    }

    public function destroy(Request $request, $id)
    {
        if($request->has('confirm_deletion')) {
            Player_team::where('team_id', $id)->delete();
            Team::find($id)->delete();
            return redirect()->back()->with('status', 'Team was deleted');
        } else {
            return redirect()->back()->with('error', 'Please confirm deletion of the team');
        }
    }
}
