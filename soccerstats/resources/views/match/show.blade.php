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
                        {{ $match->homeTeam->name }}
                    </div>
                    <div class="col-sm-12 col-lg-1 text-center display-4 mb-4">
                        {{ $match->home_score }}
                    </div>
                    <div class="col-sm-12 col-lg-1 text-center display-4 mb-4">
                        :
                    </div>
                    <div class="col-sm-12 col-lg-1 text-center display-4 mb-4">
                        {{ $match->guest_score }}
                    </div>
                    <div class="col-sm-12 col-lg-4 text-center display-4 mb-4">
                        {{ $match->guestTeam->name }}
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
                                        <h3 class="text-center">{{ $match->homeTeam->name }} players</h3>
                                        <h5>Played</h5>
                                        <ul>
                                            @foreach($homePlayers['played'] as $player)
                                                <li>{{ $player->first_name }} {{ $player->last_name }}</li>
                                            @endforeach
                                        </ul>
                                        <h5>Bench</h5>
                                        <ul>
                                            @foreach($homePlayers['bench'] as $player)
                                                <li>{{ $player->first_name }} {{ $player->last_name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <h3 class="text-center">{{ $match->homeTeam->name }} players</h3>
                                        <h5>Played</h5>
                                        <ul>
                                            @foreach($guestPlayers['played'] as $player)
                                                <li>{{ $player->first_name }} {{ $player->last_name }}</li>
                                            @endforeach
                                        </ul>
                                        <h5>Bench</h5>
                                        <ul>
                                            @foreach($guestPlayers['bench'] as $player)
                                                <li>{{ $player->first_name }} {{ $player->last_name }}</li>
                                            @endforeach
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