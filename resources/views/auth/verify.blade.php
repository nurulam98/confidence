@extends('layouts.template')

@section('content')
<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-light">{{ __('Verifikasi Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Link Verifikasi telah terkirim ke email anda.') }}
                            </div>
                        @endif

                        {{ __('Sebelum melanjutkan,')}} <b>{{ __('silahkan verifikasi email terlebih dahulu.')}}</b> {{ __('Silahkan cek email verifikasi di folder') }} <b>{{ __('Spam, Inbox, atau Promosi')}}</b>
			<br>
                        {{ __('Jika belum dapat email verifikasi, dapat klik tautan ini') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link btn-outline-primary p-0 m-0 align-baseline" style="font-weight:700px;">{{ __('Klik Disini untuk Resend Email Verifikasi') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
