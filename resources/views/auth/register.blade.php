@extends('layouts.app')

@section('content')
<div class="container login">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0">
                <div class="card-header text-center border-0 mt-3 fs-3">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-2 flex-column align-content-center">
                            

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror text-light" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                                <div id="name-error" class="text-danger py-1 invalid-feedback">

                                </div>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 flex-column align-content-center">
                            

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror text-light" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" placeholder="Lastname">
                                <div id="lastname-error" class="text-danger py-1 invalid-feedback">

                                </div>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 flex-column align-content-center">
                            

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror text-light" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 flex-column align-content-center">
                            

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror text-light" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 flex-column align-content-center">
                            

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control text-light" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                <div id="password-error" class="text-danger py-1 invalid-feedback">

                                </div>
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-center">
                            <div class="col-md-6 login d-flex justify-content-end">
                                <button type="submit" id="confirm-button" class="btn btn-primary login fw-bold" disabled>
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <span class="fs-9">
                            Tutti i campi sono obbligatori
                        </span>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
