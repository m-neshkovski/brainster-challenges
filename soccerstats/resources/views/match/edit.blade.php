@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('match.index') }}"class="btn btn-secondary mb-2">Back to matches list</a>
            <div class="card">
                <div class="card-header">{{ __('Edit match form') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/matches/{{ $match->id }}/edit" method="POST" class="form-row">
                        @csrf
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="home_team">Home team</label>
                            <select name="home_team" id="home_team" class="form-control">
                                <option value="" default selected>Select home team</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}" {{ old('home_team') ? (old('home_team') == $team->id ? 'selected' : '') : ($match->home_team == $team->id ? 'selected' : '') }}>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="guest_team">Guest team</label>
                            <select name="guest_team" id="guest_team" class="form-control">
                                <option value="" default selected>Select guest team</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}" {{ old('guest_team') ? (old('guest_team') == $team->id ? 'selected' : '') : ($match->guest_team == $team->id ? 'selected' : '') }}>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <h3>Home team players</h3>
                            @foreach($home_players as $player)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="home_players[{{ $player->id }}]" name="home_players[{{ $player->id }}]" {{ \App\Models\Game_player::where('game_id', $match->id)->where('player_id', $player->id)->first()->has_played ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_finished">{{ $player->first_name }} {{ $player->last_name }}</label>
                                </div>
                            @endforeach
                            
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <h3>Guest team players</h3>
                            @foreach($guest_players as $player)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="guest_players[{{ $player->id }}]" name="guest_players[{{ $player->id }}]" {{ \App\Models\Game_player::where('game_id', $match->id)->where('player_id', $player->id)->first()->has_played ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_finished">{{ $player->first_name }} {{ $player->last_name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group col-12">
                            <label for="schaduled_at">Schaduled at date</label>
                            <input type="date" id="schaduled_at" name="schaduled_at" class="form-control" value="{{ old('schaduled_at') ? old('schaduled_at') : date('Y-m-d', strtotime($match->schaduled_at)) }}">
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="home_score">Home team score</label>
                            <input type="number" id="home_score" name="home_score" class="form-control" value="{{ old('home_score') ? old('home_score') : $match->home_score }}">
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="guest_score">Guest team score</label>
                            <input type="number" id="guest_score" name="guest_score" class="form-control" value="{{ old('guest_score') ? old('guest_score') : $match->guest_score }}">
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is_finished" name="is_finished" {{ old('is_finished') ? (old('is_finished') == 'on' ? 'checked' : '') : ($match->is_finished ? 'checked' : '') }}>
                                <label class="form-check-label" for="is_finished">Game finished</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary ml-auto">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection