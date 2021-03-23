@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ route('match.create') }}" class="btn btn-primary mb-2">Add match</a>
            <div class="card">
                <div class="card-header">{{ __('Matches') }}</div>

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
                                <td>Schaduled at</td>
                                <td>Home team</td>
                                <td>Guest team</td>
                                <td>Result</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($matches) > 0)
                                @foreach($matches as $match)
                                <tr>
                                    <td>{{ $match->id }}</td>
                                    <td>{{ date('d.m.Y h:i', strtotime($match->schaduled_at)) }}</td>
                                    <td>{{ $match->homeTeam->name }}</td>
                                    <td>{{ $match->guestTeam->name }}</td>
                                    <td>{{ $match->home_score == null ? 'Comming up' : $match->home_score . " : " . $match->guest_score }}</td>
                                    <td>
                                        <a href="/matches/{{ $match->id }}" class="btn btn-secondary"><i class="fas fa-info"></i></a>
                                        <a href="/matches/{{ $match->id }}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <form class="d-inline-block" action="/matches/{{ $match->id }}/delete" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        </form>
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