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
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-4 pb-3">
                                    <img class="img-fluid" src="{{ Storage::url($theme->image) }}" alt="">
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-8 pb-3">
                                    <h3>{{ $theme->title }}</h3>
                                    <p>{{ $theme->description }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                          Comments
                                        </div>
                                        <div class="card-body">
                                            @if(count($theme->comments) > 0) 
                                                @foreach($theme->comments as $comment)
                                                    <blockquote class="blockquote text-center mb-0">
                                                        <span>{{ $comment->comment }}</span>
                                                        <footer class="blockquote-footer text-right">By <cite title="Source Title">{{ $comment->users->first()->first_name . " " . $comment->users->first()->last_name }}</cite></footer>
                                                    </blockquote>
                                                    <hr> 
                                                @endforeach
                                            @else
                                                <blockquote class="blockquote text-center mb-0">
                                                    <span>No comments yet!!!</span>
                                                    <footer class="blockquote-footer text-right">By <cite title="Source Title">Blog</cite></footer>
                                                </blockquote>
                                                <hr> 
                                            @endif
                                        </div>
                                      </div>
                                </div>
                                @auth
                                <div class="col-12">
                                    <hr>
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
                                    <form action="/comment/{{ $theme->id }}/create" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="comment" class="label">Post a comment</label>
                                            <textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Write a comment"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-secondary">Post</button>
                                    </form>
                                </div>
                                @else
                                    <div class="col-12 my-2 text-center">
                                        You have to <a href="/login">Login</a> or <a href="/register">Register</a> to post comments.
                                    </div>
                                @endauth
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection