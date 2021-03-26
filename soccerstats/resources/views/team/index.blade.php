@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-2">
                <div class="card-header d-flex justyfy-content-between align-items-center">
                    <span class="h3">Teams</span>
                    @if(Auth::user()->usertype->name == 'admin')
                        <a href="{{ route('team.create') }}" class="btn btn-primary ml-auto">Add team</a>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <td scope="col">id</td>
                                <td scope="col">Name</td>
                                <td scope="col">Founded</td>
                                <td scope="col" class="text-center">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                            <tr>
                                <td>{{ $team->id }}</td>
                                <td>{{ $team->name }}</td>
                                <td>{{ date('Y', strtotime($team->year_founded)) }}</td>
                                <td class="text-right">
                                    <a href="/teams/{{ $team->id }}" class="btn btn-secondary"><i class="fas fa-info"></i></a>
                                    @if(Auth::user()->usertype->name == 'admin')
                                        <a href="/teams/{{ $team->id }}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <form class="d-inline-block" action="/teams/{{ $team->id }}/delete" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="deleteCheck-{{ $team->id }}" name="confirm_deletion">
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
                {{ $teams->links() }}
            </div>
        </div>
    </div>
</div>
@endsection