@extends('layouts.app')

@section('title', '{{ $project->title }}')

@section('body')
    <div class="row project-row">
        <div class="col-12">
            <div class="container">
                <div class="row my-5">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <img class="img-fluid" src="{{ $project->image_url }}" alt="Project image">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-8">
                        <h1>{{ $project->title }}</h1>
                        <h3>{{ $project->subtitle }}</h3>
                        <p>{{ $project->desc }}</p>
                        <a class="btn btn-warning" href="/">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection