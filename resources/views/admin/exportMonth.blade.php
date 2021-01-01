@extends('layouts.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-md-2">
                    <div class="list-group">
                        <a href="{{ route('exportCouponMonth') }}" class="list-group-item {{ (\Request::route()->getName() == 'exportCouponMonth') ? 'active' : ''}}">Tanggal</a>
                        <a href="{{ route('exportCouponYear') }}" class="list-group-item {{ (\Request::route()->getName() == 'exportCouponYear') ? 'active' : ''}}">Tahun</a>
                    </div>
                </div> -->
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header bg-light">
                            Data Reporting
                        </div>
                        <div class="card-body">
			@if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <div class="container">
                                <!-- <div class="row">
                                    <div class="col-sm-2">
                                        <button type="button" href="javascript:void(0)" class="btn btn-primary" id="month" style="margin-bottom: 10px">1 Bulan</button>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary" id="months" style="margin-left: auto;margin-top: auto">Lebih 1 Bulan</button>
                                    </div>
                                </div> -->
                                <div class="row" style="margin-top: 10px;">
                                    <div class="cols-sm-12">
                                        <form action="{{route('exportCouponPost')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
						<div class="row">
						<div class="col-sm-auto">
						    <label class="control-label">Dari Tanggal :</label>
                                                    <input placeholder="Tanggal Awal" type="text" class="form-control datepicker col-sm-auto" name="awal">
						</div>
						<div class="col-sm-auto">
                                                    <label class="control-label">Sampai Tanggal :</label>
                                                    <input placeholder="Tanggal Akhir" type="text" class="form-control datepicker col-sm-auto" name="akhir">
                                                </div>
						</div>
                                            </div>
                                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Download</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function(){
            $(".datepicker").datepicker({
                format: 'dd-m-yyyy',
                autoclose: true,
                todayHighlight: true,
            });

	console.log(document.getElementById('awalTanggal').value);
        });
    </script>
@endpush
