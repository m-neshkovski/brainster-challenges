@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-2">
                <div class="card-header d-flex justyfy-content-between align-items-center">
                    <span class="h3">Matches</span>
                    @if(Auth::user()->usertype->name == 'admin')
                        <a href="{{ route('match.create') }}" class="btn btn-primary ml-auto">Add match</a>
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
                                <td scope="col">Schaduled at</td>
                                <td class="text-center" scope="col">Home team</td>
                                <td class="text-center" scope="col">Guest team</td>
                                <td class="text-center" scope="col">Result</td>
                                <td class="text-center" scope="col">Status</td>
                                <td scope="col" class="text-center">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($matches) > 0)
                                @foreach($matches as $match)
                                <tr>
                                    @if(Auth::user()->usertype->name == 'admin')
                                        <td>{{ $match->id }}</td>
                                    @endif
                                    <td>{{ date('d.m.Y', strtotime($match->schaduled_at)) }}</td>
                                    <td class="text-center"><a href="/teams/{{ $match->homeTeam->id }}">{{ $match->homeTeam->name }}</a></td>
                                    <td class="text-center"><a href="/teams/{{ $match->guestTeam->id }}">{{ $match->guestTeam->name }}</a></td>
                                    <td class="text-center">{{ $match->home_score === null ? 'Comming up' : $match->home_score . " : " . $match->guest_score }}</td>
                                    <td class="text-center">{{ $match->is_finished ? 'Final score' : ($match->home_score == null ? 'Not started' : 'In progress') }}</td>
                                    <td class="text-right">
                                        <a href="/matches/{{ $match->id }}" class="btn btn-secondary"><i class="fas fa-info"></i></a>
                                        @if(Auth::user()->usertype->name == 'admin')
                                            <a href="/matches/{{ $match->id }}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form class="d-inline-block" action="/matches/{{ $match->id }}/delete" method="POST">
                                                @csrf
                                                <div class="form-group-inline">
                                                    <button type="submit" class="btn btn-danger">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="deleteCheck-{{ $match->id }}" name="confirm_deletion">
                                                            <label class="form-check-label pl-2"><i class="fas fa-trash-alt"></i></label>
                                                        </div>
                                                    </button>
                                                </div>
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
            <div class="text-center">
                {{ $matches->links() }}
            </div>
        </div>
    </div>
</div>
@endsection