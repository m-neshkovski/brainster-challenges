@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ route('team.create') }}" class="btn btn-primary mb-2">Add team</a>
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
                                <td>id</td>
                                <td>Name</td>
                                <td>Founded</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                            <tr>
                                <td>{{ $team->id }}</td>
                                <td>{{ $team->name }}</td>
                                <td>{{ date('Y', strtotime($team->year_founded)) }}</td>
                                <td>
                                    <a href="/teams/{{ $team->id }}" class="btn btn-secondary"><i class="fas fa-info"></i></a>
                                    <a href="/teams/{{ $team->id }}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <form class="d-inline-block" action="/teams/{{ $team->id }}/delete" method="POST">
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