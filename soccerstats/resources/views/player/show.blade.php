@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ url()->previous() }}" class="btn btn-primary mb-2">Back</a>
            <div class="card">
                <div class="card-header">{{ __('Player info card') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Name: {{ $player->first_name . " " . $player->last_name }}</h3>
                    <p>Date of birth: {{ date('d.m.Y', strtotime($player->dob)) }}</p>
                    <h4>Current team: {{ count($player->team) > 0 ? $player->team->last()->name : 'Free player' }}</h4>
                    <p>Other teams player played for:</p>
                    <ul>
                        @foreach($player->team as $team)
                            <li><a href="/teams/{{ $team->id }}">{{ $team->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection