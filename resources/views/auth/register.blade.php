@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="login-page">
      <div class="form-container">
        <div class="title">
          Signup
        </div>
        <div class="form">
          <form action="">
            <div class="input-group">
              <label for="name">Full Name</label>
              <input
                type="text"
                name="full-name"
                id="name"
                placeholder="John Doe"
                required
              />
            </div>
            <div class="input-group">
              <label for="name">Email</label>
              <input
                type="email"
                name="email"
                id="email"
                placeholder="example@domain.com"
                required
              />
            </div>
            <div class="input-group">
              <label for="phone">Phone</label>
              <input
                type="number"
                name="phone"
                id="phone"
                placeholder="9841236783"
              />
            </div>
            <div class="input-group">
              <label for="phone">Password</label>
              <input
                type="password"
                name="password"
                id="password"
                placeholder="Type you password"
              />
            </div>
            <div class="input-group">
              <label for="phone">Confirm Password</label>
              <input
                type="password"
                name="confirmpassword"
                id="confirmpassword"
                placeholder="Re-type you password"
              />
            </div>
            <p class="usertype-label">
              Signup as:
            </p>
            <div class="usertype">
              <div class="check-group">
                <input
                  type="radio"
                  name="usertype"
                  id="client"
                  value="client"
                />
                <label for="client" aria-label="Client">
                  <span></span>
                  Client
                </label>
              </div>
              <div class="check-group">
                <input
                  type="radio"
                  name="usertype"
                  id="driver"
                  value="driver"
                />
                <label for="driver" aria-label="Driver">
                  <span></span>
                  Mover Driver
                </label>
              </div>
            </div>
            <div class="form-subtext">
              By signing up you agree to our
              <a href="#" class="form-link">Terms and Conditions</a>
            </div>
            <div class="input-group">
              <button class="btn btn-long">Create Account</button>
            </div>
          </form>
        </div>
        <div class="form-subtext">
          Already have an account?
          <a href="#" class="form-link">Login</a>
        </div>
      </div>
    </div>
@endsection
