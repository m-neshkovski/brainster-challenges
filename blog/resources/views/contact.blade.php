@extends('layouts.layout')

@section('title', 'Contact')

@section('header')
    @section('jumbutron')
        <div class="col-6 text-center text-light">
            <h1 class="fw-bold display-3 pb-3">Contact me</h1>
            <p class="fw-bold h6 text-white-dimm-50">Have questions? I have answers!</p>
        </div>
    @endsection
    @include('layouts.header')
@stop

@section('body')
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-4 offset-4 py-5">
                    <form action="#" method="POST">
                        <div class="mb-3">
                          <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                        </div>
                        <div class="mb-3">
                          <input type="email" class="form-control" id="email" placeholder="Email address" name="email">
                        </div>
                        <div class="mb-3">
                          <input type="tel" class="form-control" id="phone" placeholder="Phone" name="phone">
                        </div>
                        <div class="mb-3">
                          <textarea class="form-control" id="message" placeholder="Message" name="message" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-custom">SEND</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    @include('layouts.footer')
@stop