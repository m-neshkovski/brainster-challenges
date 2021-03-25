@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Auth::user()->usertype->name == 'admin')
                <a href="{{ route('player.create') }}" class="btn btn-primary mb-2">Add player</a>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Players') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <td scope="col">id</td>
                                <td scope="col">First name</td>
                                <td scope="col">Last name</td>
                                <td scope="col">Date of birth</td>
                                <td scope="col">Plays for</td>
                                <td scope="col" class="text-right">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($players as $player)
                            <tr>
                                <td>{{ $player->id }}</td>
                                <td>{{ $player->first_name }}</td>
                                <td>{{ $player->last_name }}</td>
                                <td>{{ date('d.m.Y', strtotime($player->dob)) }}</td>
                                <td>{{ count($player->team) > 0 ? $player->team->last()->name : 'Free player' }}
                                <td class="text-right">
                                    <a href="/players/{{ $player->id }}" class="btn btn-secondary"><i class="fas fa-info"></i></a>
                                    @if(Auth::user()->usertype->name == 'admin')
                                        <a href="/players/{{ $player->id }}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <form class="d-inline-block" action="/players/{{ $player->id }}/delete" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection