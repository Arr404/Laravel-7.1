@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 animate__animated animate__fadeIn">
                <div class="card-header text-center bg-white py-4">
                    <img src="{{ asset('img/logo-elit.png') }}" alt="logo" class="animate__animated animate__pulse animate__infinite" style="max-width:150px;">
                </div>
                <div class="card-body p-5">
                    <h3 class="text-center mb-4">{{ __('Login') }}</h3>
                    <form method="POST" action="{{ route('login') }}" class="form-neumorphism">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg animate__animated animate__heartBeat animate__delay-2s">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<style>
    .form-neumorphism {
        background: #fff;
        border-radius: 1rem;
        box-shadow: -8px -8px 16px #fafafa,
                    8px 8px 16px rgba(174,170,192,0.4);
        padding: 2rem;
    }
    .form-neumorphism input, .form-neumorphism button {
        border: none;
        outline: none;
        background: none;
        box-shadow: inset -4px -4px 8px #fafafa,
                    inset 4px 4px 8px rgba(174,170,192,0.4);
        padding: 0.5rem;
        border-radius: 0.5rem;
    }
    .form-neumorphism button {
        color: #fff;
        background: linear-gradient(145deg, #6d77d6, #5865d8);
        box-shadow: none;
        cursor: pointer;
    }
    .form-neumorphism button:hover {
        background: linear-gradient(145deg, #5865d8, #6d77d6);
    }
</style>
@endpush
