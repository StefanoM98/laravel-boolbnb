@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" id="register-form" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                                <div class="col-md-6">
                                    <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" autofocus>

                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                        
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span id="correct-email" class="invalid-feedback" role="alert">
                                        <strong>Make sure the email is correct</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span id="pwd-match1" class="invalid-feedback" role="alert">
                                        <strong>Passwords doesn't match</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation">
                                </div>
                                <span id="pwd-match" class="invalid-feedback" role="alert">
                                    <strong>Passwords doesn't match</strong>
                                </span>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="btn-submit" disabled>
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Script per visualizzare se le password corrispondono
        const password = document.getElementById('password');
        const confPassword = document.getElementById('password-confirm');
        const pwdMatch1 = document.getElementById('pwd-match1');
        const pwdMatch = document.getElementById('pwd-match');
        // Gestione btn submit enabled/disabled
        const btn = document.getElementById('btn-submit');

        confPassword.addEventListener('input', function () {
            let pwd = password.value;
            let confPwd = confPassword.value;
            console.log(pwd.length >= 8, confPwd.length >= 8);

            if (pwd !== confPwd) {
                password.classList.remove('is-valid');
                confPassword.classList.remove('is-valid');
                password.classList.add('is-invalid');
                confPassword.classList.add('is-invalid');
                pwdMatch.classList.add('d-block');
                pwdMatch1.classList.add('d-block');
                btn.disabled = true;
            } else if (pwd === confPwd && pwd.length >= 8 && confPwd.length >= 8) {
                password.classList.remove('is-invalid');
                confPassword.classList.remove('is-invalid');
                password.classList.add('is-valid');
                confPassword.classList.add('is-valid');
                pwdMatch.classList.add('d-none');
                pwdMatch1.classList.add('d-none');
                btn.disabled = false;
            }
        });

        // Script per vedere se la mail è stata inserita correttamente
        const mail = document.getElementById('email');
        const emailMatch = document.getElementById('correct-email');
        mail.addEventListener('input', function () {
            let my_email = mail.value;
            if (my_email.includes('@')) {
                mail.classList.remove('is-invalid');
                mail.classList.add('is-valid');
                emailMatch.classList.add('d-none');
            } else {
                mail.classList.remove('is-valid');
                mail.classList.add('is-invalid');
                emailMatch.classList.add('d-block');
            }
        });
    </script>
@endsection
