@extends('layouts.app')

@section('title', 'Login')

@section('body')

        <div class="row">
            <div class="col-sm-12 col-md-6 offset-md-3 py-5">
                <h1>Login form</h1>
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                <form action="/admin/authentication" method="POST">
                  @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Корисничко име</label>
                      <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Лозинка</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <a type="button" class="btn btn-secondary" href="/">Назад</a>
                    <button type="submit" class="btn btn-warning">Испрати</button>
                  </form>
            </div>
        </div>
        
@endsection