@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('player.index') }}"class="btn btn-secondary mb-2">Back to players list</a>
            <div class="card">
                <div class="card-header">{{ __('Edit player form') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/players/{{ $player->id }}/edit" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name') ? old('first_name') : $player->first_name }}">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name') ? old('last_name') : $player->last_name }}">
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of birth</label>
                            <input type="date" id="dob" name="dob" class="form-control" value="{{ old('dob') ? old('dob') : $player->dob }}">
                        </div>
                        <div class="form-group">
                            <label for="team_id">Team</label>
                            <select id="team_id" name="team_id" class="form-control">
                                <option value="" selected disabled>Select team</option>
                                @foreach(App\Models\Team::all() as $team)
                                    <option value="{{ $team->id }}" {{ (old('dob') ? old('dob') : $player->dob) == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection