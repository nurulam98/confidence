@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-4">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="card-header text-center text-uppercase h4 font-weight-light">
                    Registrasi
                </div>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="card-body py-2">
                        <div class="form-group">
			    <div class="input-group">
                                <div class="input-group-addon">
                                        <span class="btn btn-primary icon icon-user ikon"></span>
                                </div>
                            <input type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama">
			   </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
			   <div class="input-group">
                                <div class="input-group-addon">
                                        <span class="btn btn-primary icon icon-user ikon"></span>
                                </div>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">
			   </div>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
			    <div class="input-group">
                                <div class="input-group-addon">
                                        <span class="btn btn-primary icon icon-envelope-open ikon"></span>
                                </div>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">
			    </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
			   <div class="input-group">
                                <div class="input-group-addon">
                                        <span class="btn btn-primary icon icon-map ikon"></span>
                                </div>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="Address 1">
			    </div>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
			   <div class="input-group">
                                <div class="input-group-addon">
                                        <span class="btn btn-primary icon icon-map ikon"></span>
                                </div>
                            <input type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{ old('kota') }}" required autocomplete="kota" placeholder="Kota">
			    </div>
                            @error('kota')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
			   <div class="input-group">
                                <div class="input-group-addon">
                                        <span class="btn btn-primary icon icon-phone ikon"></span>
                                </div>
                            <input type="text" class="form-control @error('no_handphone') is-invalid @enderror" name="no_handphone" value="{{ old('no_handphone') }}" required autocomplete="no_handphone" placeholder="Nomor Seluler">
			    </div>
                            @error('no_handphone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
			    <div class="input-group">
                                <div class="input-group-addon">
                                        <span class="btn btn-primary icon icon-lock ikon"></span>
                                </div>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Kata sandi">
			    </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
