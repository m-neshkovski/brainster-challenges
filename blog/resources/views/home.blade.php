@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 pb-3">
                    <a href="/theme/create" class="btn btn-secondary">Create theme</a>
                    @if(Auth::user()->type->type == 'admin')
                        <a href="/home/approve" class="btn btn-success">Approve/Ban themes</a>
                        <a href="/home" class="btn btn-primary">Your themes</a>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Your themes') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($themes) > 0)
                        @foreach($themes as $theme)
                            <a href="/theme/{{ $theme->id }}">
                                <div class="card d-flex flex-row p-2 mb-3">
                                    <div class="d-flex flex-row justify-content-left align-items-center w-75">
                                        <div class="card-image">
                                            <img height="100px" src="{{ Storage::url($theme->image) }}" alt="Image">
                                        </div>
                                        <div class="card-body overflow-hidden">
                                            <h5 class="card-title">{{ $theme->title }}</h5>
                                            <p class="card-text">{{ $theme->description }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row justify-content-between align-items-center w-25">
                                        <div class="card-author">
                                            <span>{{ $theme->category->name }} | {{ $theme->user->first_name . " " . $theme->user->last_name }}</span>
                                        </div>
                                        <div class="card-actions">
                                            <a href="/theme/{{ $theme->id }}/edit" class="mx-1"><i class="fas fa-edit"></i></a>
                                            <!-- Button trigger modal -->
                                            <a href="/theme/{{ $theme->id }}/delete" class="mx-1" data-toggle="modal" data-target="#modal_{{ $theme->id }}"><i class="fas fa-trash-alt"></i></a>
                                        
                                            <!-- Modal -->
                                            <div class="modal fade" id="modal_{{ $theme->id }}" tabindex="-1" role="dialog" aria-labelledby="modal_{{ $theme->id }}Label" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="modal_{{ $theme->id }}Label">Delete!!!</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    Are you shoure you want to delete theme?
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="/theme/{{ $theme->id }}/delete" type="button" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            @if($theme->is_approved)
                                                <a href="{{ Auth::user()->type->type == 'admin' ? '/theme/' . $theme->id . '/status' : '' }}" class="text-success mx-1"><i class="fas fa-eye"></i></a>
                                            @else
                                                <a href="{{ Auth::user()->type->type == 'admin' ? '/theme/' . $theme->id . '/status' : '' }}" class="text-danger mx-1"><i class="fas fa-eye-slash"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                    {{ __('You are logged in post your first theme!') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
