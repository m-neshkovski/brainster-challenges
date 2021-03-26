<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\Game;
use App\Models\Game_player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index()
    {
        return view('match.index', ['matches' => Game::orderBy('schaduled_at')->paginate(10)]);
    }

    public function create()
    {
        return view('match.create', ['teams' => Team::all()]);
    }

    public function store(GameRequest $request)
    {
        $match = Game::make();
        $match->user_id = Auth::user()->id;
        $match->home_team = $request->home_team;
        $match->guest_team = $request->guest_team;
        $match->schaduled_at = $request->schaduled_at;
        $match->save();
        foreach(Team::find($match->home_team)->players as $player) {
            Game_player::create([
                'game_id' => $match->id,
                'player_id' => $player->id,
            ]);
        }
        foreach(Team::find($match->guest_team)->players as $player) {
            Game_player::create([
                'game_id' => $match->id,
                'player_id' => $player->id,
            ]);
        }
        return redirect()->back()->with('status', 'Game created successfully');
    }

    public function show($id)
    {
        $match = Game::find($id);
        $homePlayers = [
            'played' => [],
            'bench' => [],
        ];
        $guestPlayers = [
            'played' => [],
            'bench' => [],
        ];
        foreach($match->homeTeam->players as $player) {
            if(Game_player::where('game_id', $match->id)->where('player_id', $player->id)->first()->has_played) {
                $homePlayers['played'][] = $player;
            } else {
                $homePlayers['bench'][] = $player;
            }
        }
        foreach($match->guestTeam->players as $player) {
            if(Game_player::where('game_id', $match->id)->where('player_id', $player->id)->first()->has_played) {
                $guestPlayers['played'][] = $player;
            } else {
                $guestPlayers['bench'][] = $player;
            }
        }
        return view('match.show', ['match' => $match, 'homePlayers' => $homePlayers, 'guestPlayers' => $guestPlayers]);
    }

    public function edit($id)
    {
        return view('match.edit', ['match' => Game::find($id), 'teams' => Team::all(), 'home_players' => Team::find(Game::find($id)->home_team)->players, 'guest_players' => Team::find(Game::find($id)->guest_team)->players]);
    }

    public function update(GameRequest $request, $id)
    {
        $match = Game::find($id);
        if($match->home_team != $request->home_team || $match->guest_team != $request->guest_team) {
            Game_player::where('game_id', $match->id)->delete();
            foreach(Team::find($request->home_team)->players as $player) {
                Game_player::create([
                    'game_id' => $match->id,
                    'player_id' => $player->id,
                ]);
            }
            foreach(Team::find($request->guest_team)->players as $player) {
                Game_player::create([
                    'game_id' => $match->id,
                    'player_id' => $player->id,
                ]);
            }
        }
        $match->user_id = Auth::user()->id;
        $match->home_team = $request->home_team;
        $match->guest_team = $request->guest_team;
        $match->schaduled_at = $request->schaduled_at;
        $match->home_score = $request->home_score;
        $match->guest_score = $request->guest_score;
        $match->is_finished = $request->is_finished == 'on' ? true : false;
        $match->update();
        foreach($match->players as $player) {
            Game_player::where('game_id', $match->id)->where('player_id', $player->id)->update([
                'has_played' => false,
            ]);
        }
        if($request->home_players) {
            foreach($request->home_players as $player_id => $has_played) {
                Game_player::where('game_id', $match->id)->where('player_id', $player_id)->update([
                    'has_played' => true,
                ]);
            }
        }
        if($request->guest_players) {
            foreach($request->guest_players as $player_id => $has_played) {
                Game_player::where('game_id', $match->id)->where('player_id', $player_id)->update([
                    'has_played' => true,
                ]);
            }
        }
        return redirect()->back()->with('status', 'Game updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        // dd($request->all());

        if($request->has('confirm_deletion')) {
            Game::find($id)->delete();
            return redirect()->back()->with('status', 'Match deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Please confirm deletion of the match');
        }
    }
}
