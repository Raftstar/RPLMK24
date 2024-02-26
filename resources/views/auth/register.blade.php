@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row">
      <div class="col-12 col-sm-7 col-md-6 m-auto">
        <div class="card border-0 shadow">
          <div class="card-body">
            <svg class="mx-auto my-3" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus class="form-control my-4 py-2" placeholder="Username">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" class="form-control my-4 py-2" placeholder="Password">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" class="form-control my-4 py-2" placeholder="Email">
                                <input id="namalengkap" type="namalengkap" class="form-control @error('namalengkap') is-invalid @enderror" name="namalengkap" required autocomplete="nama lengkap"class="form-control my-4 py-2" placeholder="Nama Lengkap">
                                <input id="alamat" type="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required autocomplete="alamat"class="form-control my-4 py-2" placeholder="Alamat">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" class="form-control my-4 py-2" placeholder="Confirm masuk">

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning">
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
@endsection
