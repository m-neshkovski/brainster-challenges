@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ route('player.create') }}" class="btn btn-primary mb-2">Add player</a>
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
                                <td>id</td>
                                <td>First name</td>
                                <td>Last name</td>
                                <td>Date of birth</td>
                                <td>Plays for</td>
                                <td>Actions</td>
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
                                <td>
                                    <a href="/players/{{ $player->id }}" class="btn btn-secondary"><i class="fas fa-info"></i></a>
                                    <a href="/players/{{ $player->id }}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <form class="d-inline-block" action="/players/{{ $player->id }}/delete" method="POST">
                                    @csrf

                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
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