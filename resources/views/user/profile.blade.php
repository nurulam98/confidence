@extends('layouts.template')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-light">
                        Account Settings
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-dismissible alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <form action="{{ route('userProfilePost') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col-md-4 mb-4">
                                    <div>Profile Information</div>
                                    <div class="text-muted small">These information are visible to the public.</div>
                                </div>

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Name</label>
                                                <input class="form-control" name="name" value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Username</label>
                                                <input class="form-control" name="username" value="{{ Auth::user()->username }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Email Address</label>
                                                <input class="form-control" name="email" value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">No Handphone</label>
                                                <input class="form-control" name="no_handphone" value="{{ Auth::user()->no_handphone }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-5">
                                <div class="col-md-4 mb-4">
                                    <div>Access Credentials</div>
                                    <div class="text-muted small">Leave credentials fields empty if you don't wish to change the password.</div>
                                </div>

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Password Sekarang</label>
                                                <input name="password" type="password" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Password Baru</label>
                                                <input name="new_password" type="password" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Password Baru Konfirmasi</label>
                                                <input name="new_password_confirmation" type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light text-right">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection