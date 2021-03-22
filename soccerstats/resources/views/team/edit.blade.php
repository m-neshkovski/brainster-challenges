@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('team.index') }}"class="btn btn-secondary mb-2">Back to teams list</a>
            <div class="card">
                <div class="card-header">{{ __('Edit team form') }}</div>

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
                    <form action="/teams/{{ $team->id }}/edit" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') ? old('name') : $team->name }}">
                        </div>

                        <div class="form-group">
                            <label for="year_founded">Founded at</label>
                            <select type="date" id="year_founded" name="year_founded" class="form-control" value="{{ old('year_founded')  ? old('year_founded') : $team->year_founded }}">
                                <option value="" selected disabled>Select year</option>
                                @for($i = date('Y', strtotime(now())); $i > 1900; $i--)
                                <option value="{{ $i }}" {{ ((old('year_founded')  ? old('year_founded') : $team->year_founded) == $i) ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
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