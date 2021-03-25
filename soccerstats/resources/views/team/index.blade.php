@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Auth::user()->usertype->name == 'admin')
                <a href="{{ route('team.create') }}" class="btn btn-primary mb-2">Add team</a>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Teams') }}</div>

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
                                <td scope="col">Name</td>
                                <td scope="col">Founded</td>
                                <td scope="col" class="text-right">Actions</td>
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