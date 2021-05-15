@extends('layouts.template')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card p-4">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <span class="h4 d-block font-weight-normal mb-2">{{ $points }}</span>
                            <span class="font-weight-light">Kupon Anda</span>
                        </div>

                        <div class="h2 text-muted">
                            <i class="icon icon-badge"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
