@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-12 pb-3">
                    <a href="/home" class="btn btn-secondary">Home</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Create new theme form') }}</div>
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
                    <form action="/theme/{{ $theme->id }}/edit" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="title">Theme title</label>
                          <input type="text" class="form-control" id="title" name="title" placeholder="Enter theme title" value="{{ $theme ? $theme->title : old('theme') }}">
                        </div>
                        <div class="form-group">
                          <label for="image" class="d-block">Choose theme image</label>
                          <input type="file" id="image" name="image" value="{{ $theme ? '' : old('image') }}">
                        </div>
                        <div class="form-group">
                          <label for="description" class="d-block">Description</label>
                          <textarea id="description" name="description" class="form-control" rows="3" placeholder="Theme description...">{{ $theme ? $theme->description : old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <select name="category" id="category" class="form-control custom-select">
                                <option value="" selected disabled>Select theme category</option>
                                @foreach (App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}" {{ $theme ? ($theme->category_id == $category->id ? 'selected' : '') : (old('category') == $category->id ? 'selected' : '') }}>{{ $category->name }}</option>
                                @endforeach
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