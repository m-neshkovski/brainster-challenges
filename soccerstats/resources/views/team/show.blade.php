@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ url()->previous() }}" class="btn btn-primary mb-2">Back</a>
            <div class="card">
                <div class="card-header">{{ __('Team info card') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Name: {{ $team->name }}</h3>
                    <p>Year founded: {{ date('Y', strtotime($team->year_founded)) }}</p>
                    <h4>Team players</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Date of birth</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($team->players as $player)
                                <tr>
                                    <td>{{ $player->id }}</td>
                                    <td>{{ $player->first_name }}</td>
                                    <td>{{ $player->last_name }}</td>
                                    <td>{{ $player->dob }}</td>
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