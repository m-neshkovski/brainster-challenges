<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Models\Player;
use App\Models\Player_team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    public function index()
    {
        return view('player.index', ['players' => Player::paginate(10)]);
    }

    public function create()
    {
        return view('player.create');
    }

    public function store(PlayerRequest $request)
    {
        $player = Player::make();
        $player->user_id = Auth::user()->id;
        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $player->dob = $request->dob;
        $player->save();
        if($request->team_id) {
            $p_t = Player_team::make();
            $p_t->player_id = $player->id;
            $p_t->team_id = $request->team_id;
            $p_t->save();
        }
        return redirect()->back()->with('status', 'Player successfully added.');
    }

    public function show($id)
    {
        return view('player.show', ['player' => Player::find($id)]);
    }

    public function edit($id)
    {
        $player = Player::find($id);
        return view('player.edit', ['player' => $player]);
    }

    public function update(PlayerRequest $request, $id)
    {
        $player = Player::find($id);
        $player->user_id = Auth::user()->id;
        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $player->dob = $request->dob;
        $player->update();
        if($request->team_id) {
            $p_t = Player_team::make();
            $p_t->player_id = $player->id;
            $p_t->team_id = $request->team_id;
            $p_t->save();
        }
        return redirect()->back()->with('status', 'Player successfully updated.');
    }

    public function destroy(Request $request, $id)
    {
        if($request->has('confirm_deletion')) {
            Player_team::where('player_id', $id)->delete();
            Player::find($id)->delete();
            return redirect()->back()->with('status', 'Player was deleted');
        } else {
            return redirect()->back()->with('error', 'Please confirm deletion of the player');
        }
    }
}
