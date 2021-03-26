@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-2">
                <div class="card-header d-flex justyfy-content-between align-items-center">
                    <span class="h3">Players</span>
                    @if(Auth::user()->usertype->name == 'admin')
                        <a href="{{ route('player.create') }}" class="btn btn-primary ml-auto">Add player</a>
                    @endif
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                @if(Auth::user()->usertype->name == 'admin')
                                    <td scope="col">id</td>
                                @endif
                                <td scope="col">First name</td>
                                <td scope="col">Last name</td>
                                <td scope="col">Date of birth</td>
                                <td scope="col">Plays for</td>
                                <td scope="col" class="text-center">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($players as $player)
                            <tr>
                                @if(Auth::user()->usertype->name == 'admin')
                                    <td>{{ $player->id }}</td>
                                @endif
                                <td>{{ $player->first_name }}</td>
                                <td>{{ $player->last_name }}</td>
                                <td>{{ date('d.m.Y', strtotime($player->dob)) }}</td>
                                <td><a href="{{ count($player->team) > 0 ? '/teams/' . $player->team->last()->id : '' }}">{{ count($player->team) > 0 ? $player->team->last()->name : 'Free player' }}</a></td>
                                <td class="text-right">
                                    <a href="/players/{{ $player->id }}" class="btn btn-secondary"><i class="fas fa-info"></i></a>
                                    @if(Auth::user()->usertype->name == 'admin')
                                        <a href="/players/{{ $player->id }}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <form class="d-inline-block" action="/players/{{ $player->id }}/delete" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="deleteCheck-{{ $player->id }}" name="confirm_deletion">
                                                <label class="form-check-label pl-2"><i class="fas fa-trash-alt"></i></label>
                                            </div>
                                        </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center">
                {{ $players->links() }}
            </div>
        </div>
    </div>
</div>
@endsection