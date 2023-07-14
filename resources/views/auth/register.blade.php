@extends('layouts.app')

@section('content')
     {{-- <div class="container mt-4">
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
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

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
    </div>  --}}


    <div class="d-flex justify-content-center mt-3 mb-5">
        <form class="form" method="POST" id="register-form" action="{{ route('register') }}">
            
                @csrf

            <p class="title">Register </p>
            <p class="message">Signup now and get full access to our app. </p>
                <div class="flex">
                <label>
                    <input id="name" type="text" class="input" name="name" value="{{ old('name') }}" autocomplete="" autofocus>
                    <span>{{ __('Name') }}</span>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </label>
        
                <label>
                    <input id="surname" type="text" class="input" name="surname" value="{{ old('surname') }}" autofocus>
                    <span>{{ __('Surname') }}</span>
                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </label>
            </div>  
                    
            <label>
                <input id="surname" type="text" class="input" name="surname" value="{{ old('surname') }}" autofocus>
                <span>{{ __('E-Mail Address*') }}</span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        <span id="correct-email" class="invalid-feedback" role="alert">
                            <strong>Make sure the email is correct</strong>
                        </span>
            </label> 
            <label>
                <input id="date_of_birth" type="date" class="input" name="date_of_birth" value="{{ old('date_of_birth') }}" autofocus>
                <span>{{ __('Date of birth') }}</span>
                        @error('date_of_birth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            </label> 
                
            <label>
                <input id="password" type="password" class="input" @error('password') is-invalid @enderror" name="password">
                <span>{{ __('Password*') }}</span>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <span id="pwd-match1" class="invalid-feedback" role="alert">
                <strong>Passwords doesn't match</strong>
            </span>
            </label>
            <label>
                <input id="password-confirm" type="password" class="input @error('password') is-invalid @enderror" name="password_confirmation">
                <span>{{ __('Confirm Password*') }}</span>
                <span id="pwd-match" class="invalid-feedback" role="alert">
                    <strong>Passwords doesn't match</strong>
                </span>
            </label>
            <button type="submit" class="submit" id="btn-submit" disabled>
                {{ __('Register') }}
            </button>
            <p class="signin">Already have an acount ? <a href="#">Signin</a> </p>
        </form>
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

<style>
        .form {
  display: flex;
  flex-direction: column;
  gap: 10px;
  max-width: 350px;
  background-color: #fff;
  padding: 20px;
  border-radius: 20px;
  border: 2px solid rgb(8, 236, 244);
  box-shadow: 0 15px 20px -3px rgba(1, 1, 1, 0.1), 0 4px 6px -2px rgba(5, 5, 5, 0.05);
  position: relative;
}

.title {
  font-size: 28px;
  color: rgb(8, 236, 244);;
  font-weight: 600;
  letter-spacing: -1px;
  position: relative;
  display: flex;
  align-items: center;
  padding-left: 30px;
}

.title::before,.title::after {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  border-radius: 50%;
  left: 0px;
  background-color: rgb(8, 236, 244);;
}

.title::before {
  width: 18px;
  height: 18px;
  background-color: rgb(8, 236, 244);;
}

.title::after {
  width: 18px;
  height: 18px;
  animation: pulse 1s linear infinite;
}

.message, .signin {
  color: rgba(88, 87, 87, 0.822);
  font-size: 14px;
}

.signin {
  text-align: center;
}

.signin a {
  color: royalblue;
}

.signin a:hover {
  text-decoration: underline royalblue;
}

.flex {
  display: flex;
  width: 100%;
  gap: 6px;
}

.form label {
  position: relative;
}

.form label .input {
  width: 100%;
  padding: 10px 10px 20px 10px;
  outline: 0;
  border: 1px solid rgba(105, 105, 105, 0.397);
  border-radius: 10px;
}

.form label .input + span {
  position: absolute;
  left: 10px;
  top: 15px;
  color: grey;
  font-size: 0.9em;
  cursor: text;
  transition: 0.3s ease;
}

.form label .input:placeholder-shown + span {
  top: 15px;
  font-size: 0.9em;
}

.form label .input:focus + span,.form label .input:valid + span {
  top: 30px;
  font-size: 0.7em;
  font-weight: 600;
}



.submit {
  border: none;
  outline: none;
  background-color: rgb(8, 236, 244);;
  padding: 10px;
  border-radius: 10px;
  color: #fff;
  font-size: 16px;
  transform: .3s ease;
}

.submit:hover {
  background-color: rgb(8, 125, 145);
}

@keyframes pulse {
  from {
    transform: scale(0.9);
    opacity: 1;
  }

  to {
    transform: scale(1.8);
    opacity: 0;
  }
}
</style>
@endsection
