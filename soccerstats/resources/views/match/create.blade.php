@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('match.index') }}"class="btn btn-secondary mb-2">Back to matches list</a>
            <div class="card">
                <div class="card-header">{{ __('Create match form') }}</div>

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
                    <form action="{{ route('match.store') }}" method="POST" class="form-row">
                        @csrf
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="home_team">Home team</label>
                            <select name="home_team" id="home_team" class="form-control">
                                <option value="" default selected>Select home team</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}" {{ old('home_team') ? old('home_team') == $team->id ? 'selected' : '' : '' }}>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="guest_team">Guest team</label>
                            <select name="guest_team" id="guest_team" class="form-control">
                                <option value="" default selected>Select guest team</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}" {{ old('guest_team') ? old('guest_team') == $team->id ? 'selected' : '' : '' }}>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="schaduled_at">Schaduled at date</label>
                            <input type="date" id="schaduled_at" name="schaduled_at" class="form-control" value="{{ old('schaduled_at') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection