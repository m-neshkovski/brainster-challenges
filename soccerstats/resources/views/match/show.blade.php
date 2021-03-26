@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ url()->previous() }}" class="btn btn-primary mb-2">Back</a>
            <div class="card">
                <div class="card-header">{{ __('Match info card') }}</div>
                <div class="card-body row justify-content-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-sm-12 text-center display-4 mb-4">
                        Match
                    </div>
                    <div class="col-sm-12 col-lg-4 text-center display-4 mb-4">
                        <a href="/teams/{{ $match->home_team }}">{{ $match->homeTeam->name }}</a>
                    </div>
                    <div class="col-sm-12 col-lg-1 text-center display-4 mb-4">
                        {{ $match->home_score !== null ? $match->home_score : '/' }}
                    </div>
                    <div class="col-sm-12 col-lg-1 text-center display-4 mb-4">
                        :
                    </div>
                    <div class="col-sm-12 col-lg-1 text-center display-4 mb-4">
                        {{ $match->guest_score !== null ? $match->guest_score : '/' }}
                    </div>
                    <div class="col-sm-12 col-lg-4 text-center display-4 mb-4">
                        <a href="/teams/{{ $match->gurst_team }}">{{ $match->guestTeam->name }}</a>
                    </div>
                    <div class="col-sm-12 mb-4">
                        <div id="accordion">
                            <div class="card">
                              <div class="card-header" id="playersTab">
                                <h5 class="mb-0">
                                  <button class="btn btn-secondary" data-toggle="collapse" data-target="#collapsePlayers" aria-expanded="false" aria-controls="collapsePlayers">
                                    Players
                                  </button>
                                </h5>
                              </div>
                              <div id="collapsePlayers" class="collapse" aria-labelledby="playersTab" data-parent="#accordion">
                                <div class="card-body row">
                                    <div class="col-sm-12 col-lg-6">
                                        <h3>{{ $match->homeTeam->name }} players</h3>
                                        <h5>Played</h5>
                                        <ul>
                                            @if(count($homePlayers['played']) > 0)
                                                @foreach($homePlayers['played'] as $player)
                                                    <li><a href="/players/{{ $player->id }}">{{ $player->first_name }} {{ $player->last_name }}</a></li>
                                                @endforeach
                                            @else
                                                <li>No data</li>
                                            @endif
                                        </ul>
                                        <h5>Bench</h5>
                                        <ul>
                                            @if(count($homePlayers['bench']) > 0)
                                                @foreach($homePlayers['bench'] as $player)
                                                    <li><a href="/players/{{ $player->id }}">{{ $player->first_name }} {{ $player->last_name }}</a></li>
                                                @endforeach
                                            @else
                                                <li>No data</li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <h3>{{ $match->guestTeam->name }} players</h3>
                                        <h5>Played</h5>
                                        <ul>
                                            @if(count($guestPlayers['played']) > 0)
                                                @foreach($guestPlayers['played'] as $player)
                                                    <li><a href="/players/{{ $player->id }}">{{ $player->first_name }} {{ $player->last_name }}</a></li>
                                                @endforeach
                                            @else
                                                <li>No data</li>
                                            @endif
                                        </ul>
                                        <h5>Bench</h5>
                                        <ul>
                                            @if(count($guestPlayers['bench']) > 0)
                                                @foreach($guestPlayers['bench'] as $player)
                                                    <li><a href="/players/{{ $player->id }}">{{ $player->first_name }} {{ $player->last_name }}</a></li>
                                                @endforeach
                                            @else
                                                <li>No data</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection