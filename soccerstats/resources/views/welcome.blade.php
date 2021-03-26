@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-center py-5">Soccer pending matches, <a href="/login">login</a> or <a href="/refister">register</a> for more information.</h1>
            <div class="card mb-2">
                <div class="card-header">
                    <h3>Pending matches</h3>
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
                            <tr class="h5 font-weight-bold">
                                <td scope="col">Schaduled at</td>
                                <td class="text-center" scope="col">Home team</td>
                                <td class="text-center" scope="col">Guest team</td>
                                <td class="text-center" scope="col">Result</td>
                            </tr>
                        </thead>
                        <tbody class="h5">
                            @if(count($matches) > 0)
                                @foreach($matches as $match)
                                <tr>
                                    <td>{{ date('d.m.Y', strtotime($match->schaduled_at)) }}</td>
                                    <td class="text-center"><a href="/teams/{{ $match->homeTeam->id }}">{{ $match->homeTeam->name }}</a></td>
                                    <td class="text-center"><a href="/teams/{{ $match->guestTeam->id }}">{{ $match->guestTeam->name }}</a></td>
                                    <td class="text-center">{{ $match->home_score === null ? 'Comming up' : $match->home_score . " : " . $match->guest_score }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">
                                        No pennding matches yet.
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