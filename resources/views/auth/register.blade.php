@extends('layouts.auth')

@section('title')
    Register | Assessment Jendela 360
@endsection

@section('content')

<div class="container">
    <div class="card card-primary mt-3">
        <div class="card-header text-center"><h4>Form Register</h4></div>
        <div class="card-body">
            <form method="POST" action="{{ route('auth.postregister') }}">
                @csrf
                @if (session()->has("success"))
                <div class="alert alert-success">
                        <li>{{ session()->get("success") }}</li>
                </div>
                @elseif (session()->has("error"))
                <div class="alert alert-danger">
                        <li>{{ session()->get("error") }}</li>
                </div>
                @endif

                <div class="form-group">
                    <label for="email">Nama</label>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                        placeholder="Enter Name" value="{{ old('name') }}" autofocus
                        required>
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                        placeholder="Enter Email" value="{{ old('email') }}"
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
                    <div class="d-block">
                        <label for="password" class="control-label">Konfirmasi Password</label>
                        <div class="float-right">
                        </div>
                    </div>
                    <input type="password" name="password_confirmation" placeholder="Enter Password Confirmation"
                        class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}"
                        required>
                    <div class="invalid-feedback">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Register
                    </button>
                    <p class="text-center">
                        Have a registered access? Click <a href="{{ route('auth.login') }}">Login.</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
