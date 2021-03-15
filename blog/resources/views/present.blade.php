@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
                <div class="pb-3">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                </div>
                <div class="card">
                    <div class="card-header">{{ __('Create new theme form') }}</div>
                    <div class="card-body">
                        <img src="{{ Storage::url($theme->image) }}" alt="">
                        <h3>{{ $theme->title }}</h3>
                        <p>{{ $theme->description }}</p>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection