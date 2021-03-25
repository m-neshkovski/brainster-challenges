@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Auth::user()->usertype->name == 'admin')
                <a href="{{ route('match.create') }}" class="btn btn-primary mb-2">Add match</a>
            @endif
            <div class="card">
                <div class="card-header h3">{{ __('Matches') }}</div>

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
                                <td scope="col">Schaduled at</td>
                                <td class="text-center" scope="col">Home team</td>
                                <td class="text-center" scope="col">Guest team</td>
                                <td class="text-center" scope="col">Result</td>
                                <td class="text-center" scope="col">Status</td>
                                <td scope="col" class="text-right">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($matches) > 0)
                                @foreach($matches as $match)
                                <tr>
                                    <td>{{ $match->id }}</td>
                                    <td>{{ date('d.m.Y h:i', strtotime($match->schaduled_at)) }}</td>
                                    <td class="text-center"><a href="/teams/{{ $match->homeTeam->id }}">{{ $match->homeTeam->name }}</a></td>
                                    <td class="text-center"><a href="/teams/{{ $match->guestTeam->id }}">{{ $match->guestTeam->name }}</a></td>
                                    <td class="text-center">{{ $match->home_score == null ? 'Comming up' : $match->home_score . " : " . $match->guest_score }}</td>
                                    <td class="text-center">{{ $match->is_finished ? 'Final score' : ($match->home_score == null ? 'Not started' : 'In progress') }}</td>
                                    <td class="text-right">
                                        <a href="/matches/{{ $match->id }}" class="btn btn-secondary"><i class="fas fa-info"></i></a>
                                        @if(Auth::user()->usertype->name == 'admin')
                                            <a href="/matches/{{ $match->id }}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form class="d-inline-block" action="/matches/{{ $match->id }}/delete" method="POST">
                                                @csrf
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">
                                        No matches yet.
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection