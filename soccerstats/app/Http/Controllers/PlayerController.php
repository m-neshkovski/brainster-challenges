<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('player.index', ['players' => Player::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('player.create');
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date'
        ]);

        $player = Player::make();
        $player->user_id = Auth::user()->id;
        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $player->dob = $request->dob;

        if($request->team_id) {
            DB::table('player_team')->create([
                'team_id' => $request->team_id,
                'player_id' => $player->id,
            ]);
        }

        $player->save();
        
        return redirect()->back()->with('status', 'Player successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::find($id);
        // dd($player);
        // return redirect()->route('player.create')->with('action', 'edit');
        return view('player.edit', ['player' => $player]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date'
        ]);

        $player = Player::find($id);
        $player->user_id = Auth::user()->id;
        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $player->dob = $request->dob;

        if($request->team_id) {
            DB::table('player_team')->update([
                'team_id' => $request->team_id,
                'player_id' => $player->id,
            ]);
        }

        $player->update();
        
        return redirect()->back()->with('status', 'Player successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }
}
