@extends('layouts.auth')
@section('content')
    <div class="container">
        <div class="card card-primary mt-3">
            <div class="card-header text-center"><h4>Form Login</h4></div>
            <div class="card-body">
                <form method="POST" action="{{ route('auth.postlogin') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                            placeholder="Enter Email" value="{{ old('email') }}" autofocus
                            required>
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Password</label>
                            <div class="float-right">
                            </div>
                        </div>
                        <input type="password" name="password" placeholder="Enter Password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}"
                            required>
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Login
                        </button>
                        <p class="text-center">
                            Have no access yet? Click <a href="{{ route('auth.register') }}">register.</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
