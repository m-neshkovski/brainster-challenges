<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Game_player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('match.index', ['matches' => Game::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('match.create', ['teams' => Team::all()]);
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
            
            'home_team' => 'required|different:guest_team',
            'guest_team' => 'required|different:home_team',
            'schaduled_at' => 'required|date',
        ]);

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $match = Game::find($id);
        
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('match.edit', ['match' => Game::find($id), 'teams' => Team::all(), 'home_players' => Team::find(Game::find($id)->home_team)->players, 'guest_players' => Team::find(Game::find($id)->guest_team)->players]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'home_team' => 'required|different:guest_team',
            'guest_team' => 'required|different:home_team',
            'schaduled_at' => 'required|date',
        ]);

        $change_in_teams = false;

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

            $change_in_teams = true;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Game::find($id)->delete();

        return redirect()->back()->with('status', 'Match deleted successfully');
    }
}
