@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Notice') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Email with verification link was sent to You. Please follow the link to verify your account. If for any reaseon you can't find the email, follow this <a href="/verification/resend/{{ auth()->user()->id }}">link to resend email</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection