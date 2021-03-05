@extends('layouts.app')

@section('title', 'Brainster labs')

@section('body')
    <div class="row baner-row">
        <div class="col-12 text-center banner-col text-light d-flex flex-column align-items-center justify-content-center">
            <h1>Brainster.xyz Labs</h1>
            <p>Проекти од академиите на Brainster</p>
        </div>
    </div>
    <div class="row cards-row pt-3">
        <div class="col-12">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center py-3">
                        <h3>Проекти</h3>
                    </div>
                    @foreach($cards as $card)
                    <div class="col-sm-12 col-md-6 col-lg-4 pb-3">
                        <div class="card">
                            <img src="{{ $card->image_url }}" class="card-img-top image-fluid" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{ $card->title }}</h5>
                              <h6 class="card-subtitle">{{ $card->subtitle }}</h6>
                              <p class="card-text">{{ $card->desc }}</p>
                              <a href="/project/{{ $card->id }}" class="btn btn-warning">Повеќе</a>
                            </div>
                          </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
@endsection