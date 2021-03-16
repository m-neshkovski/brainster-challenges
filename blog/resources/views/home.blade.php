@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 pb-3">
                        <a href="/theme/create" class="btn btn-secondary">Create theme</a>
                        @if (Auth::user()->type->type == 'admin')
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
                        @if (count($themes) > 0)
                            @foreach ($themes as $theme)
                                <div class="card py-3 mb-3">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-8 col-xl-9 m-0">
                                                <a class="d-block" href="/theme/{{ $theme->id }}">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-4 col-xl-4 mb-2">
                                                            <img class="img-fluid" src="{{ Storage::url($theme->image) }}" alt="Image">
                                                        </div>
                                                        <div class="col-xs-12 col-md-8 col-xl-8 overflow-hidden mb-2">
                                                            <h5>{{ $theme->title }}</h5>
                                                            <p>{{ $theme->description }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12 col-md-4 col-xl-3 text-right mb-2">
                                                <span class="d-block">{{ $theme->category->name }} |
                                                    {{ $theme->user->first_name . ' ' . $theme->user->last_name }}</span>
                                                <div class="card-actions">
                                                    <a href="/theme/{{ $theme->id }}/edit" class="mx-1"><i
                                                            class="fas fa-edit"></i></a>
                                                    <!-- Button trigger modal -->
                                                    <a href="/theme/{{ $theme->id }}/delete" class="mx-1"
                                                        data-toggle="modal" data-target="#modal_{{ $theme->id }}"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                    @if ($theme->is_approved)
                                                        <a href="{{ Auth::user()->type->type == 'admin' ? '/theme/' . $theme->id . '/status' : '' }}"
                                                            class="text-success mx-1"><i class="fas fa-eye"></i></a>
                                                    @else
                                                        <a href="{{ Auth::user()->type->type == 'admin' ? '/theme/' . $theme->id . '/status' : '' }}"
                                                            class="text-danger mx-1"><i class="fas fa-eye-slash"></i></a>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal_{{ $theme->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modal_{{ $theme->id }}Label"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal_{{ $theme->id }}Label">
                                                                Delete!!!</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you shoure you want to delete theme?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <a href="/theme/{{ $theme->id }}/delete" type="button"
                                                                class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            @endforeach
                        @else
                            @if(Route::currentRouteName() == 'home')
                            {{ __('You are logged in post your first theme!') }}
                            @else
                            {{ __('All posts are approved!!') }}
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
