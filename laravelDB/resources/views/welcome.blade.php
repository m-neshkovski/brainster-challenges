@extends('layouts.app')

@if(session()->get('loggedin') !== NULL && session()->get('loggedin'))
@section('title', 'Brainster labs | Admin')
@else
@section('title', 'Brainster labs')
@endif

@section('body')

@if(session()->get('loggedin') !== NULL && session()->get('loggedin'))
<div class="row">
    <div class="col-12 p-0 m-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="pt-3">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            {{-- <button class="nav-link active" id="nav-create-tab" data-bs-toggle="tab" data-bs-target="#nav-create" type="button" role="tab" aria-controls="nav-create" aria-selected="true">create</button> --}}
                            <button class="nav-link active" id="nav-edit-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-edit" type="button" role="tab" aria-controls="nav-edit"
                                aria-selected="false">Измени</button>
                            <button class="nav-link" id="nav-create-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-create" type="button" role="tab" aria-controls="nav-create"
                                aria-selected="true">Креирај</button>
                        </div>
                    </nav>
                    <div class="tab-content pb-3 row" id="nav-tabContent">
                        <div class="tab-pane fade show active py-3" id="nav-edit" role="tabpanel"
                            aria-labelledby="nav-edit-tab">
                            <div class="container">
                                <div class="row">
                                    @if ($errors->any())
                                        <div class="col-12">
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                    @foreach($cards as $card)
                                    <div class="col-sm-12 col-md-6 col-lg-4 pb-3">
                                        <div class="card">
                                            <img src="{{ $card->image_url }}" class="card-img-top image-fluid" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $card->title }}</h5>
                                                <h6 class="card-subtitle">{{ $card->subtitle }}</h6>
                                                <p class="card-text">{{ $card->desc }}</p>
                                                <a href="/project/{{ $card->id }}" class="btn btn-warning mb-1">Повеќе</a>
                                                <form class="d-inline-block" action="/project/{{ $card->id }}/edit" method="POST">
                                                    @csrf
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-secondary mb-1" data-bs-toggle="modal" data-bs-target="#editModal-{{ $card->id }}">
                                                        Измени
                                                    </button>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal-{{ $card->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModal-{{ $card->id }}-Label" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="editModal-{{ $card->id }}-Label">Измени</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {{-- @if ($errors->any())
                                                                    <div class="alert alert-danger">
                                                                        <ul>
                                                                            @foreach ($errors->all() as $error)
                                                                                <li>{{ $error }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endif --}}
                                                                <div class="mb-3">
                                                                    <label for="image_url_{{ $card->id }}" class="form-label">URL од Слика</label>
                                                                    <input type="text" class="form-control" id="image_url_{{ $card->id }}" name="image_url" value="{{ $card->image_url }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="title_{{ $card->id }}" class="form-label">Наслов</label>
                                                                    <input type="text" class="form-control" id="title_{{ $card->id }}" name="title" value="{{ $card->title }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="subtitle_{{ $card->id }}" class="form-label">Поднаслов</label>
                                                                    <input type="text" class="form-control" id="subtitle_{{ $card->id }}" name="subtitle" value="{{ $card->subtitle }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="desc_{{ $card->id }}" class="form-label">Опис</label>
                                                                    <input type="text" class="form-control" id="desc_{{ $card->id }}" name="desc" value="{{ $card->desc }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Затвори</button>
                                                            <button type="submit" class="btn btn-danger">Потврди</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <form class="d-inline-block" action="/project/{{ $card->id }}/delete" method="POST">
                                                    @csrf
                                                    <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $card->id }}">
                                                        Избриши
                                                    </button>
                                                    <div class="modal fade" id="deleteModal_{{ $card->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModal_{{ $card->id }}Label" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="deleteModal_{{ $card->id }}Label">Избриши</h5>
                                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                              Дали сте сигурни дека сакате да го избришете проектот?
                                                            </div>
                                                            <div class="modal-footer">
                                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
                                                              <button type="submit" class="btn btn-danger">Избриши</button>
                                                            </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane py-3 col-xs-12 col-md-6 offset-md-3 fade" id="nav-create" role="tabpanel"
                            aria-labelledby="nav-create-tab">
                            <h3>Креирај нов проект</h3>
                            @if ($errors->any())
                                <div class="col-12">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            <form action="/project/create" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="image_url" class="form-label">URL од Слика</label>
                                    <input type="text" class="form-control" id="image_url" name="image_url">
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Наслов</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="mb-3">
                                    <label for="subtitle" class="form-label">Поднаслов</label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle">
                                </div>
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Опис</label>
                                    <input type="text" class="form-control" id="desc" name="desc">
                                </div>
                                <button type="submit" class="btn btn-warning">Креирај</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@else
<div class="row baner-row">
    <div class="col-12 text-center banner-col text-light d-flex flex-column align-items-center justify-content-center">
        <h1>Brainster.xyz Labs</h1>
        <p>Проекти од академиите на Brainster</p>
    </div>
</div>
<div class="row cards-row pt-3">
    <div class="col-12 m-0 p-0">
        <div class="container">
            <div class="row">
                @foreach($cards as $card)
                <div class="col-xs-12 col-sm-6 col-lg-4 pb-3">
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

<!-- Modal -->
<div class="modal fade" id="vrabotiModal" tabindex="-1" aria-labelledby="vrabotiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="vrabotiModalLabel">Вработи наш студент</h5>
          <button id="vrabotiModalCloseBtn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="form-row" action="/employer/add" method="POST">
                @csrf
                <input type="text" class="d-none" value="true" id="modal-control" name="modal-control">
                @if(session()->get('poraka') !== NULL && session()->get('poraka') === true)
                  <div class="alert alert-success" role="alert">
                    Вашите податоци се успешно внесени, доколку сакате можете да внесете и други.
                  </div>
                @endif
                <div class="col-12 mb-3">
                  <label for="vrabotiEmail" class="form-label">Е-мејл</label>
                  <input type="text" class="form-control mb-2 @error('title') is-invalid @enderror" id="vrabotiEmail" name="vrabotiEmail" value="{{ old('vrabotiEmail') }}">
                  @error('vrabotiEmail')
                      <div class="alert alert-danger py-2">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12 mb-3">
                  <label for="vrabotiPhone" class="form-label">Телефон</label>
                  <input type="text" class="form-control mb-2 @error('title') is-invalid @enderror" id="vrabotiPhone" name="vrabotiPhone" value="{{ old('vrabotiPhone') }}">
                  @error('vrabotiPhone')
                      <div class="alert alert-danger py-2">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12 mb-3">
                  <label for="vrabotiCompany" class="form-label">Компанија</label>
                  <input type="text" class="form-control mb-2 @error('title') is-invalid @enderror" id="vrabotiCompany" name="vrabotiCompany" value="{{ old('vrabotiCompany') }}">
                  @error('vrabotiCompany')
                      <div class="alert alert-danger py-2">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12 d-grid">
                    <button type="submit" class="btn btn-warning">Испрати</button>
                    <button type="button" class="d-none btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endif

@endsection
